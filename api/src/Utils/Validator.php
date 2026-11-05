<?php

namespace App\Utils;

use App\Utils\Connection;

class Validator
{
    protected static $errors = [];

    private static function getValue(array $data, string $field)
    {
        $keys = explode('.', $field);

        foreach ($keys as $key) {
            if (!is_array($data) || !array_key_exists($key, $data)) {
                return null;
            }

            $data = $data[$key];
        }

        return $data;
    }

    public static function validate(array $data, $rules)
    {
        $errors = [];

        foreach ($rules as $field => $fieldRules) {

            $value = self::getValue($data, $field);

            foreach ($fieldRules as $rule => $message) {

                if ($rule === 'required' && ($value === null || $value === '')) {
                    $errors[$field][] = $message;
                } elseif ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = $message;
                } elseif (str_starts_with($rule, 'max:')) {
                    $max = (int) explode(':', $rule)[1];

                    if (is_string($value) && strlen($value) > $max) {
                        $errors[$field][] = $message;
                    }
                } else if (str_starts_with($rule, 'unique|')) {
                    $model = explode('|', $rule)[1];

                    $model = new $model();

                    if ($model->where($field, $value)->exists()) {
                        $errors[$field][] = $message;
                    }
                }
            }
        }

        self::$errors = $errors;

        return empty($errors);
    }

    public static function hasErrors()
    {
        return count(self::$errors) > 0;
    }

    public static function getErrors()
    {
        return self::$errors;
    }
}

<?php
namespace App;

class Filter {

    const MIN_PASSWORD_LEN = 5;
    const MAX_PASSWORD_LEN = 24;
    const MIN_USERNAME_LEN = 2;
    const MAX_USERNAME_LEN = 80;

    public static function filter(string $input_value): string
    {
        $first_filter = htmlspecialchars($input_value);
        return filter_var($first_filter, FILTER_SANITIZE_STRING);

    }
}


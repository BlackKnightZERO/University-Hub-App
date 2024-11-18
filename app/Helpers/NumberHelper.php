<?php

namespace app\Helpers;

class NumberHelper
{
    public static function convertToBangla($number)
    {
        $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($englishNumbers, $banglaNumbers, $number);
    }
}
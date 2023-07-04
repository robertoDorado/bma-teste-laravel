<?php

if (!function_exists("formatDate")) {
    
    function formatDate($string, $convertFrom, $convertTo) {
        $dateObj = date_create_from_format($convertFrom, $string);
        $formattedDate = $dateObj->format($convertTo);
        return $formattedDate;
    }
}

if (!function_exists('onlyNumber')) {

    function onlyNumber($string) {
        $string = str_replace("R$ ", "", $string);
        $format = numfmt_create('pt_BR', NumberFormatter::DECIMAL);
        return floatval(numfmt_parse($format, $string));
    }
}

if (!function_exists('numberFormatReal')) {
    
    function numberFormatReal($value) {
        $value = number_format($value, 2, ',', '.');
        return 'R$ ' . $value;
    }
}

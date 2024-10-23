<?php

// class Helpers
// {

//     public static function numberFormat($value)
//     {
//         return number_format($value, 2, '.', ',');
//     }
// }

if (!function_exists('moneyFormat')) {
    function moneyFormat($valor, $decimal = 2)
    {
        return "R$ " . number_format($valor, $decimal, ',', '.');
    }
}

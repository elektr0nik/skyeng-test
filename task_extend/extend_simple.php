<?php
function bigSum($a, $b)
{
    if (!is_numeric($a) || !is_numeric($b)) {
        return false;
    }

    $len = max(strlen($a), strlen($b));

    $a_reverse = strrev($a);
    $b_reverse = strrev($b);

    $arr_result = [];
    $remainder = 0;

    for ($i = 0; $i < $len; $i++) {
        $a_symbol = $a_reverse[$i] ? $a_reverse[$i] : 0;
        $b_symbol = $b_reverse[$i] ? $b_reverse[$i] : 0;

        $sum = strval($a_symbol + $b_symbol + $remainder);

        if (strlen($sum) > 1) {
            $arr_result[] = $sum[1];
            $remainder = 1 ;
        } else {
            $arr_result[] = $sum;
            $remainder = 0;
        }
    }

    return strrev(implode('', $arr_result));
}

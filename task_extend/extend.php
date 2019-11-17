<?php
const BLOCK_SIZE = 4;

function bigSum($a, $b)
{
    if (!is_numeric($a) || !is_numeric($b)) {
        return false;
    }

    $big = $a;
    $small = $b;

    if (strlen($a) < strlen($b)) {
        $big = $b;
        $small = $a;
    }

    $small_arr = str_split(strrev($small), BLOCK_SIZE);

    $arr_result = [];
    $remainder = $position = 0;

    foreach ($small_arr as $value) {
        $small_chunk = strrev($value);
        $len = strlen($small_chunk);
        $position += $len;
        $big_chunk = substr($big, -$position, $len);
        $sum = strval($big_chunk + $small_chunk + $remainder);

        if (strlen($sum) > $len) {
            $remainder = substr($sum, 0, -$len);
            $arr_result[] = substr($sum, -$len);
        } else {
            $remainder = 0;
            $arr_result[] = $sum;
        }
    }

    $arr_result[] = substr($big, 0, -$position) + $remainder;

    return implode('', array_reverse($arr_result));
}

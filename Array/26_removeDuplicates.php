<?php

function removeDuplicates1($nums)
{
    $length = count($nums);
    if ($length <= 1) return $length;
    $i = 0;
    for ($j = 1; $j < $length; $j++) {
        if ($nums[$i] != $nums[$j]) {
            $i++;
            $nums[$i] = $nums[$j];
        }
    }
    return $i + 1;
}

function removeDuplicates($nums)
{
    $length = count($nums);
    if ($length <= 1) return $length;
    // 循环 然后进行数组上的原地处理
    for ($i = 0; $i < $length; $i++) {
        if ($nums[$i] == $nums[$i + 1]) unset($nums[$i]);
    }
    return $nums;
}

print_r(removeDuplicates1([0, 0, 1, 1, 1, 2, 2, 3, 3, 4]));
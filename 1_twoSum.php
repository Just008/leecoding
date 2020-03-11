<?php

function twoSum($sums, $target)
{
    /*
    // 暴力破解循环
    for ($i = 0; $i < count($sums); $i++) {
        for ($j = $i + 1; $j < count($sums); $j++) {
            if ($target == $sums[$i] + $sums[$j]) return [$i, $j];
        }
    }
    return [];
    */

    // key value 对应
    $map = $index = [];
    foreach ($sums as $key => $sum) {
        if (isset($map[$sum])) {
            return [$map[$sum], $key];
            break;
        }
        $map[$target - $sum] = $key;
    }
    return $index;
}

print_r(twoSum([2, 3, 4], 6));
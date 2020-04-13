<?php

// 解析：本题分为暴力破解法和一遍哈希表两种方式来实现的，可以直接查看官方解析即可

function twoSum($sums, $target)
{
    // 暴力破解循环
    for ($i = 0; $i < count($sums); $i++) {
        for ($j = $i + 1; $j < count($sums); $j++) {
            if ($target == $sums[$i] + $sums[$j]) return [$i, $j];
        }
    }
    return [];
}

function twoSum2($sums, $target)
{
    // 一遍哈希表
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
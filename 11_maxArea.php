<?php
// 这个题目的内容是计算面积，

// 方法1：暴力法
function maxArea1($height)
{
    $max = 0;
    for ($i = 0; $i < count($height); $i++) {
        for ($j = $i + 1; $j < count($height); $j++) {
            $area = min($height[$i], $height[$j])*($j - $i);
            $max = max($max, $area);
        }
    }
    return $max;
}

// 方法2 快慢指针
function maxArea($height)
{
    $max = 0;
    $left = 0;
    $right = count($height) - 1;
    while ($left != $right) {
        $area = ($right - $left)*min($height[$left], $height[$right]);
        $max = max($max, $area);
        $height[$left] >= $height[$right] ? $right-- : $left++;
    }
    return $max;
}

print_r(maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]));
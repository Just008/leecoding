<?php
//本题可以做三层暴力求解， 当然这种方法存在问题：
// 问题1：三层 for 循环，根本过不了 LeetCode 的审核
// 问题2：还要在进行一次二维数组去重，这个会很耗时
function threeSum1($nums)
{
    $count = count($nums);
    $res = [];
    if ($count < 3) {
        return $res;
    }
    sort($nums);
    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            for ($k = $j + 1; $k < $count; $k++) {
                if ($nums[$i] + $nums[$j] + $nums[$k] === 0) {
                    $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                }
            }
        }
    }
    return array_unique($res, SORT_REGULAR);
}

// 本题解法二：使用两层循环+快慢指针的思路进行
function threeSum($nums)
{
    sort($nums);
    $count = count($nums);
    $res = [];
    if ($count < 3) return $res;
    for ($i = 0; $i < $count; $i++) {
        if ($nums[$i] > 0) break; // 起点大于 0 就没可能进行下去
        if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue;// 本次的开始数据跟上次的一样就跳过
        $left = $i + 1;
        $right = $count - 1;
        while ($left < $right) {
            $sum = $nums[$i] + $nums[$left] + $nums[$right];
            if ($sum > 0) {
                $right--;
            } else if ($sum < 0) {
                $left++;
            } else {
                $res[] = [$nums[$i], $nums[$left], $nums[$right]];
                if ($left < $right && $nums[$left] == $nums[$left + 1]) $left++;
                if ($left < $right && $nums[$right] == $nums[$right - 1]) $right--;
                $right--;
                $left++;
            }
        }
    }
    return $res;
}


print_r(threeSum([-1, 0, 1, 2, -1, -4]));
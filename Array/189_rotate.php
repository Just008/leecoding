<?php
function rotate($nums, $k)
{
    for ($i = 0; $i < $k; $i++) {
        $num = array_pop($nums);
        array_unshift($nums, $num);
    }
    return $nums;
}

print_r(rotate([1, 2, 3, 4, 5, 6, 7], 3));
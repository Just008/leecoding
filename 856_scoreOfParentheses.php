<?php

// 括号的分数
/**
 * @param $S
 * @解法：分为两种，
 * @情景1 ：找到平衡点，然后分为左右两侧在进行递归
 * @情景2 ：一直嵌套，不存在平衡点一说
 */
function scoreOfParentheses($S)
{
    return score($S, 0, strlen($S) - 1);
}

function score($str, $left, $right)
{
    if ($right - $left == 1) return 1;
    $b = 0;
    for ($i = $left; $i < $right; $i++) {
        if ($str[$i] == '(') ++$b;
        if ($str[$i] == ')') --$b;
        if ($b == 0) return score($str, $left, $i) + score($str, $i + 1, $right);
    }
    return 2*score($str, $left + 1, $right - 1);
}

// 这个使用的是
function scoreOfParentheses2($S) {
    $ans = 0;
    $d = -1;
    for($i = 0; $i < strlen($S); $i++) {
        $d += $S[$i] == '(' ? 1 : -1;
        if ($S[$i] == '(' && $S[$i+1] == ')') {
            $ans += 1 << $d;
        }
    }
    return $ans;
}
print_r(scoreOfParentheses("(()(()))"));
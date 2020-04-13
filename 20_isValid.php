<?php
// 有效的括号

function isValid1($string)
{

}

// 使用栈结构，维持入栈和出栈
function isValid($string)
{
    $length = strlen($string);
    if ($length == 0) return true;
    if ($length % 2 != 0) return false;
    $stack = new SplStack();
    $left = ['(' => 1, '{' => 1, '[' => 1];
    for ($i = 0; $i < $length; $i++) {
        if (isset($left[$string[$i]])) {
            $stack->push($string[$i]);
        } else {
            if($stack->isEmpty()) return false;
            // 这里需要判断闭合而不是打开标签
            if ($string[$i] == '}' && $stack->pop() != '{') return false;
            if ($string[$i] == ']' && $stack->pop() != '[') return false;
            if ($string[$i] == ')' && $stack->pop() != '(') return false;
        }
    }
    return $stack->isEmpty();
}

var_dump(isValid('()'));
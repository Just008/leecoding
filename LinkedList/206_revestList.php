<?php

/**
 * @param ListNode $head
 * @return ListNode
 */
function reverseList($head)
{

    $prev = null;
    $cur = $head;

    while ($cur) {
        $next = $cur->next;
        print_r($next);
        $cur->next = $prev;
        $prev = $cur;
        $cur = $next;
    }
    return $prev;
}

// 递归的方式调用
function reverseList1($head)
{
    if ($head->next == null) return $head;
    $last = reverseList1($head->next);
    $head->next->next = $head;
    $head->next = null;

    return $last;
}

$linked = new NodeList(null);
$linked->push(1);
$linked->push(2);
$linked->push(3);
$linked->push(4);
$linked->push(5);
print_r($linked);
exit();
print_r(reverseList($linked));
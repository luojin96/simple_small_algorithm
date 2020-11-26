<?php
/**
 * Created by PhpStorm.
 * User: 12427
 * Date: 2020/5/14
 * Time: 21:57
 */
class LinkedList{
    public $val;
    public $next;
    public function __construct($val)
    {
        $this->val = $val;
    }
}


class Test{
    public function isPalindromeStr(LinkedList $linkedList){
        if($linkedList == null || $linkedList->next == null){
            return true;
        }
        $strRev = null;//反转链表
        $slow = $linkedList;//慢指针
	    $fast = $linkedList;//快指针
        //快指针跑完链表跳出循环
        while ($fast != null && $fast->next != null){
            $fast = $fast->next->next;
            //慢指针数据反转
            $next = $slow->next;
            $slow->next = $strRev;
            $strRev = $slow;
            $slow = $next;
        }
        //当链表数据为奇数时的判断
        if($fast != null){
            $slow = $slow->next;
        }
       //慢指针和反转链表进行判断
        while ($slow != null){
            if($slow != $strRev){
                return false;
            }
            $slow = $slow->next;
            $strRev = $strRev->next;
        }

        return true;

    }
}

$linkedList[0] = new LinkedList(1);
$linkedList[1] = new LinkedList(2);
$linkedList[2] = new LinkedList(3);
$linkedList[3] = new LinkedList(3);
$linkedList[4] = new LinkedList(2);
$linkedList[5] = new LinkedList(1);

$linkedList[0]->next = $linkedList[1];
$linkedList[1]->next = $linkedList[2];
$linkedList[2]->next = $linkedList[3];
$linkedList[3]->next = $linkedList[4];
$linkedList[4]->next = $linkedList[5];

$test = new Test();

var_dump($test->isPalindromeStr($linkedList[0]));
<?php
class LinkedList{
    public $val;
    public $next;
    public function __construct($val = '')
    {
        $this->val = $val;
    }
}

Class Test{
    /**
     * 单链表反转
     * @param LinkedList $linkedList
     * @return LinkedList|string|null
     */
    public function LinkedListRev(LinkedList $linkedList){
        if($linkedList == null){
            return "请输入正确的链表";
        }
        $listRev = null;//反转链表
        $list = null;
        while ($linkedList != null){
            $next = $linkedList->next;
            $linkedList->next = $listRev;
            $listRev = $linkedList;
            $linkedList = $next;
        }
        return $listRev;
    }


    /**
     * 链表中环的检测
     * @param LinkedList $linkedList
     * @return bool
     */
    public function LinkedListRing(LinkedList $linkedList){
        if($linkedList == null || $linkedList->next == null || $linkedList->next->next == null){
            return false;
        }
        $slow = $linkedList;//慢链表
        $fast = $linkedList;//快链表

        while ($fast != null && $fast->next != null){
            $fast = $fast->next->next;
            $slow = $slow->next;
            if($slow == $fast){
                return true;
            }
        }

        return false;

    }

    public function LinkedListMerge(LinkedList $linkedList_a,LinkedList $linkedList_b){
        if($linkedList_a == null){
            return $linkedList_b;
        }
        if($linkedList_b == null){
            return $linkedList_a;
        }

        $newList = new LinkedList();
        $mergeList = $newList;

        while ($linkedList_a != null && $linkedList_b !=null){
            $next = null;
            if($linkedList_a->val < $linkedList_b->val){
                $newList->next = $linkedList_a;
                $linkedList_a = $linkedList_a->next;
            }else{
                $newList->next = $linkedList_b;
                $linkedList_b = $linkedList_b->next;
            }
            $newList = $newList->next;
        }

        if($linkedList_a != null){
            $newList->next = $linkedList_a;
        }

        if($linkedList_b != null){
            $newList->next = $linkedList_b;
        }

        return $mergeList->next;

    }

    /**
     * 删除链表倒数第n个结点
     * @param LinkedList $linkedList
     * @param $num
     * @return string
     */
    public function deleteLastNode(LinkedList $linkedList,$num){
        if($linkedList == null || $linkedList->next == null){
            return "请输入正确的链表";
        }
        $item = 1;

        $slow = $linkedList;
        $fast = $linkedList;

        while ($fast == null || $item<$num){
            $fast = $fast->next;
            $item++;
        }

        if($fast == null){
            return "您输入的n值大于您的链表长度";
        }
        $pre = new LinkedList();
        $newList = $pre;
        while ($fast->next != null){
            $pre->next = $slow;
            $slow = $slow->next;;
            $fast = $fast->next;
            $pre = $pre->next;

        }
        $pre->next = $slow->next;

        return $newList->next;
    }


    public function findMidNode(LinkedList $linkedList){
        if($linkedList == null || $linkedList->next == null || $linkedList->next->next == null){
            return false;
        }
        $slow = $linkedList;
        $fast = $linkedList;

        while ($fast->next != null && $fast->next->next != null){
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        if($fast->next != null){
            return "中间节点的值为：".$slow->val."和".$slow->next->val;

        }

        return "中间节点值为：".$slow->val;

    }


}


//$node[0] = new LinkedList(1);
//$node[1] = new LinkedList(2);
//$node[2] = new LinkedList(3);
//$node[3] = new LinkedList(4);
//
//$node[0]->next = $node[1];
//$node[1]->next = $node[2];
//$node[2]->next = $node[0];
//$node[3]->next = $node[0];

$test = new Test();
//var_dump($test->LinkedListRev($node[0]));

//var_dump($test->LinkedListRing($node[0]));

$node_a[0] = new LinkedList(1);
$node_a[1] = new LinkedList(4);

$node_b[0] = new LinkedList(2);
$node_b[1] = new LinkedList(3);

$node_a[0]->next = $node_a[1];
$node_b[0]->next = $node_b[1];

$merge = $test->LinkedListMerge($node_a[0],$node_b[0]);


$delNode[0] = new LinkedList(1);
$delNode[1] = new LinkedList(2);
$delNode[2] = new LinkedList(3);
$delNode[3] = new LinkedList(4);
$delNode[4] = new LinkedList(5);
$delNode[5] = new LinkedList(6);
$delNode[6] = new LinkedList(7);

$delNode[0]->next = $delNode[1];
$delNode[1]->next = $delNode[2];
//$delNode[2]->next = $delNode[3];
//$delNode[3]->next = $delNode[4];
//$delNode[4]->next = $delNode[5];
//$delNode[5]->next = $delNode[6];

//var_dump($test->deleteLastNode($delNode[0],4));

var_dump($test->findMidNode($delNode[0]));


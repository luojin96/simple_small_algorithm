<?php
$list = [1,2,3,4];




/*
 * 约瑟夫问题 递归方法 时间复杂度O(n)
 * @param int $total 总人数
 * @param int $index 被踢序号
 * @return int $num 幸存者编号
 */
//function josephusA($total, $index){
//    $result = 0; //最终只有一个人时候，幸存者的新编号一定是1，那么求余为1%1=0
//    for($i=2;$i<=$total;$i++){  //循环根据新编号获得旧编号,从两个人开始，直到游戏开始时的人数
//        $result = ($result + $index) % $i;
//    }
//    $num = $result+1; //因为是根据求余获得编号，所以最终编号需要+1
//    return $num;
//}
//
//echo josephusA(9,4);


function calf($list,$key){
    $count = count($list);
    $end = $count - 1;
    $mod = 0;
    for($i = 0;$i<$end;$i++){
        $mod = ($key-1+$mod)%$count;
//        $biaoji = $mod;
        array_splice($list,$mod,1);
        $count--;

    }

    return $list;
}

print_r(calf($list,4));





<?php
//参考书籍：算法导论
/**
 * 思想：主要是可以用快速排序的思想，
 * 1、取一个值做中间值，然后进行分类，
 * 2、取出中间值在的那一半数据
 * 3、重复上面步骤，直至查找出中间值
 */
$list = [8,87,534,43,9,345,45,99,67,56,78,10,83];
/**
 * @authod luojin
 * @notes 求数组中间值
 * @email 122773692@qq.com
 * @time 2018-7-23 09:45:28
 * @param $list 数组
 * @param $start 开始下标
 * @param $end 结束下标
 * @param $mid 数组中间值下标
 * @return mixed 中间值
 */
function median($list,$start,$end,$mid){
    $temp = $list[$start];//标记值
    $mark = $start;//标记值最终下标
    //比较
    for($i=$start+1;$i<=$end;$i++){
        //更小值往前提,标记值下标完后移
        if($list[$i]<$temp){
            $list[$mark] = $list[$i];
            $mark++;
            //判断移入的位置是不是大于标记值，若大于，则完后移
            if($list[$mark]>=$temp)
                $list[$i] = $list[$mark];
        }
    }
    $list[$mark] = $temp;
    //获取中间值
    if($mark == $mid)
        return $list[$mark];

    if($mark>$mid)//标记值比中间值大
        return median($list,$start,($mark-1),$mid);
    else//标记值比中间值小
        return median($list,($mark+1),$end,$mid);

}

$end = count($list)-1;
$mid = $end/2;
var_dump(median($list,0,$end,$mid));




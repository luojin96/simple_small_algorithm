<?php

//参考资料：https://www.cnblogs.com/wangjingwangjing/p/5241486.html
/**
 * 备注：博主能实现快速排序，但是快速排序是可以直接在原址排序，
 * 但博主采取的是将左右分组，参考下面的评论，如果数据太多的情况下
 * 会导致内存占用较多，个人也偏向于在原址排序中实现，如果代码还可以优化
 * 可以邮箱通知哦，谢谢查看的小伙伴
 **/
//参考书籍：算法导论

$list = [6,3,8,6,4,2,9,5,1];

/**
 * @authod luojin
 * @notes 快速排序，，在原址上排序，每次以第一个数作为中间值
 * @time 208-07-17 23:01:28
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @param $start 开始位置
 * @param $end 结束位置
 */
function QuickSort(array &$list,$start,$end){
    //比较值（中间值）
    $temp = $list[$start];
    //开始位置
    $start_ = $start;
    for ($i=$start+1;$i<=$end;$i++){
        if($list[$i]<$temp){
            //当值小于中间值，往前移
            $list[$start] = $list[$i];
            //中间值下标完后移
            $start++;
            //若该值是大于中间值的数值，则将大于中间值的数值放入小于中间值的位置
            if($list[$start]>=$temp)
                $list[$i] = $list[$start];
        }
    }
    //放入中间值
    $list[$start] = $temp;
    //左值继续递归，直到值为1或为空时跳出
    if($start_ <($start-1))
        QuickSort($list,$start_,($start-1));
    //右值继续递归，直到值为1或为空时跳出
    if($end>($start+1))
        QuickSort($list,($start+1),$end);

}
$end = count($list)-1;
QuickSort($list,0,$end);
var_dump($list);

?>
<?php

$list =[1,2,7,8,9,4,6,5,3];

//参考资料：https://blog.csdn.net/baidu_30000217/article/details/53087079  参考书籍：算法导论

/**
 * @authod luojin
 * @time 2018-07-13 22:16:05
 * @notes 交换数组中两个数的值
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @param $b
 * @param $c
 */
function Max_(array &$list,$b,$c){
    $list[$b] = $list[$b]^$list[$c];
    $list[$c] = $list[$b]^$list[$c];
    $list[$b] = $list[$b]^$list[$c];
}

/**
 * @authod luojin
 * @notes 将数组排成最大堆的形式
 * @time 2018-07-16 22:23:10
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @param $start 开始位置
 * @param $end 结束位置
 */
function HeapAdjust(array &$list,$start,$end){
    $temp = $list[$start];

    //$j = 2*$start+1,这个是因为，子堆一定是2n+1和2n+2
    for ($j = 2*$start+1;$j <= $end;$j = $j*2+1){

        //$j != $end是防止右子堆没有了，和右子堆都已经排序完成。后面是判断比较右子堆和左子堆
        if($j != $end && $list[$j]<$list[$j+1]){
            $j++;
        }
        //这个代表这个已经形成最大堆，无须在判断
        if($temp>=$list[$j]){
            break;
        }
        //获得最大堆，将值放入最大堆..
        $list[$start] = $list[$j];
        $start = $j;
    }

    $list[$start] = $temp;
}

/**
 * @authod luojin
 * @notes 堆排序
 * @time 2018-07-16 22:18:06
 * @email 1242773692@qq.com
 * @param array $list 数组
 */
function HeapSort(array &$list){
    $count = count($list);

    //这个循环是将数组转化成最大堆
    for ($i = floor($count/2)-1;$i>=0;$i--){
        HeapAdjust($list,$i,$count-1);
    }

    //每次将最大值放入最后，最终获得升序排序
    for ($i = $count-1;$i>0;$i--){
        Max_($list,0,$i);
        HeapAdjust($list,0,$i-1);
    }

}


HeapSort($list);
var_dump($list);






?>
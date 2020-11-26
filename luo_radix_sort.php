<?php

//参考书籍：算法导论
/**
 * 基数排序：其主要思想是:
 * 1、先创建十个数组0-9
 * 2、然后从个位数开始，将数组中个位数的数字对应放入不同的数组中
 * 3、将0-9堆中的数据放入数组中，
 * 4、重复2,3步骤，直至最高位数。
 */
$list = [89,67,54,1,234,5689,443,8,7658,13,125,788,8,46];

/**
 * @authod luojin
 * @notes 基数排序算法实现
 * @time 2018-7-20 14:31:39
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @param $divide_by 需除以的数字
 */
function radixSort_(array &$list,$divide_by){
    $row = array();
    //创建十个数组堆
    for($i=0;$i<=9;$i++){
        $row[$i] = array();
    }

    //将数组中的数据放入数组堆中
    for($i=0;$i<count($list);$i++){
        $temp = $list[$i]/$divide_by%10;
        $row[$temp][] = $list[$i];
    }
    //将数据放回数组中
    $list = array();
    foreach ($row as $v){
        for ($i=0;$i<count($v);$i++){
            $list[] = $v[$i];
        }
    }
}

/**
 * @authod luojin
 * @notes 基数排序
 * @time 2018-7-20 14:29:57
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @return array
 */
function redixSort(array &$list){
    //求最长的个数
    $max = max($list);
    $len = strlen($max);
    //每个位数的数组进行比较
    for ($i=0;$i<$len;$i++){
        radixSort_($list,pow(10,$i));
    }

    return $list;

}

print_r(redixSort($list));
?>
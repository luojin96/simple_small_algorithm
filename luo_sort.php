<?php

$list =[386,3,97,866,23,9,451,684];
/**
 * @authod luojin
 * @Notes 插入排序(升序)
 * @time 2018年7月6日10:17:15
 * @email 1242773692@qq.com
 * @param $list 数组
 * @return array
 */
function InsertSort(array $list)
{

    for ($i = 1; $i < count($list); $i++){
        $data = $list[$i];
        //当前值大于需插入的值，将值往后提
        for ($j = $i;$j > 0 && $list[$j-1]>$data; $j--){
            $list[$j] = $list[$j-1];
        }
        //将当前值插入到当前数组合适的位置
        $list[$j] = $data;
    }

    return $list;
}

//print_r(InsertSort([386,3,97,866,23,9,451,684]));


/**
 * @authod luojin
 * @Notes 归并排序(升序)
 * @Reference material 参考资料：https://blog.csdn.net/baidu_30000217/article/details/53363795  参考书籍：大话数据结构
 * @time 2018年7月8日23:03:15
 * @email 1242773692@qq.com
 * @param $list 数组
 * @return array
 */
function MergeSort(array &$list){
    $start = 0;
    $end = count($list)-1;
    //将数组对半分解，最终分解成两两一组
    MSort($list,$start,$end);
}

/**
 * @authod luojin
 * @Notes
 * @param array $list
 * @param $start
 * @param $end
 */
function MSort(array &$list,$start,$end){
    //递归，将数组转成最小两两对比
    if ($start<$end){
        $mid = floor(($start+$end)/2);

        MSort($list,$start,$mid);
        MSort($list,($mid+1),$end);
        //进行排序
        Merge($list,$start,$mid,$end);
    }
}

/**
 * @authod luo
 * @Notes
 * @param array $list 排序数组
 * @param $start 开始下标
 * @param $mid 中间下标
 * @param $end 最终下标
 */
function Merge(array &$list,$start,$mid,$end){
    $i = $start;
    $j = $mid+1;
    $k = $start;
    $row = array();

    //将两个数组中最小的值取出
    while ($i!=($mid+1) && $j!=($end+1)){
        if($list[$i]>=$list[$j]){
            $row[$k++] = $list[$j++];
        }else{
            $row[$k++] = $list[$i++];
        }
    }

    //若第一个数组中最终剩余值，则将值传入数组中
    while ($i != ($mid+1)){
        $row[$k++] = $list[$i++];
    }

    //若第二个数组中最终剩余值，则将值传入数组中
    while ($j != ($end+1)){
        $row[$k++] = $list[$j++];
    }

    //将所有数组中的数据放入数组中
    for ($i = $start;$i<=$end;$i++){
        $list[$i] = $row[$i];
    }
}

MergeSort($list);
var_dump($list);
?>
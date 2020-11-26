<?php

/**
 * 冒泡排序
 * @author luojin
 * @time 2020-06-02
 * @param $list
 * @return mixed
 */
function BubbleSort($list){
    for ($i = 0; $i<count($list); $i++){
        for ($j = ($i+1); $j<count($list); $j++){
            if($list[$i]>$list[$j]){
                $val = $list[$i];
                $list[$i] = $list[$j];
                $list[$j] = $val;
            }
        }
    }
    return $list;
}
//$list = [10,8,12,7,14];
//var_dump(BubbleSort($list));

/**
 * 插入排序
 * @author luojin
 * @time 2020-06-02
 * @param $list
 * @return mixed
 */
function InsertionSort($list){
    for ($i=1; $i<count($list); $i++){
        for ($j = $i; $j>0; $j--){
            if($list[$j] < $list[$j-1]){
                $val = $list[$j];
                $list[$j] = $list[$j-1];
                $list[$j-1] = $val;
            }else{
                break;
            }
        }
    }
    return $list;
}

//$list = [10,8,12,7,14];
//var_dump(InsertionSort($list));


/**
 * 选择排序
 * @author luojin
 * @time 2020-06-03
 * @param $list
 * @return mixed
 */
function SelectionSort($list){
    for ($i=0; $i<count($list); $i++){
        $min = $i;
        $val = $list[$i];
        for ($j=($i+1); $j<count($list); $j++){
            if($val>$list[$j]){
                $val = $list[$j];
                $min = $j;
            }
        }
        $val = $list[$i];
        $list[$i] = $list[$min];
        $list[$min] = $val;
        var_dump($list);
    }
    return $list;
}

//$list = [10,12,14,7,8];
//var_dump(SelectionSort($list));

/**
 * 归并排序
 * @author luojin
 * @time 2020-06-03
 * @param $list
 * @return mixed
 */
function MergeSort($list){
    MSort($list,0,(count($list)-1));
    return $list;
}

/**
 * 将数组拆分，对半切分，最终切成一个数值，再将数组合并
 * @author luojin
 * @time 2020-06-03
 * @param $list
 * @param $min
 * @param $max
 * @return mixed
 */
function MSort(&$list,$min,$max){
    if($min >= $max)
        return $list;
    $middle = floor(($min + $max)/2);
    //对半拆分，最终得到单个数据
    MSort($list,$min,$middle);
    MSort($list,($middle+1),$max);
    //合并数组
    merge($list,$min,$middle,$max);
}

/**
 * 将数组和并
 * @author luojin
 * @time 2020-06-03
 * @param $list
 * @param $min
 * @param $middle
 * @param $max
 */
function merge(&$list,$min,$middle,$max){
    $mid = ($middle+1);//后数组的起始下标
    $start = $min;//合并起始下标
    $row = [];//临时数组
    $i = $min;//临时数组的下标

    //当前后两个数组都还有值的时候，进行对比数据，放入临时数组中
    while ($min<=$middle && $mid<=$max){
        if($list[$min]<$list[$mid]){
            $row[$i] = $list[$min];
            $min++;
        }else{
            $row[$i] = $list[$mid];
            $mid++;
        }
        $i++;
    }
    //前半段数组还存在数据
    while ($min<=$middle){
        $row[$i] = $list[$min];
        $min++;
        $i++;
    }
    //后半段数组还存在数据
    while ($mid<=$max){
        $row[$i] = $list[$mid];
        $mid++;
        $i++;
    }

    //将临时数组中的数据放入数组中
    for ($i = $start; $i<=$max; $i++){
        $list[$i] = $row[$i];
    }

}
//$list = [8,1,5,2,3,6,4,7];
//var_dump(MergeSort($list));


/**
 * 快速排序
 * @author luojin
 * @time 2020-06-04
 * @param $list
 * @return mixed
 */
function QuickSort($list)
{
    QSort($list,0,(count($list)-1));
    return $list;
}

/**
 * 核心每次取数组最后一个值，小于该值的放入数组左边，大于该值的放入数组右边，
 * 然后以该点为中心点，将数组分成两个小数组，再用同样的方法，最终当数组只有一个值的时候退出程序
 * @author luojin
 * @time 2020-06-04
 * @param $list
 * @param $start
 * @param $end
 * @return bool
 */
function QSort(&$list,$start,$end)
{
    //退出递归的条件
    if($start>=$end)
        return false;

    //中间值的下标
    $mid = partition($list, $start, $end);
    QSort($list,$start,($mid-1));
    QSort($list,($mid+1),$end);

}

/**
 * 核心，将小于数组最后的值放入左边，大于最后一个值，放入数组右边，最终求出中间值的下标
 * @author luojin
 * @time 2020-06-04
 * @param $list
 * @param $start
 * @param $end
 * @return mixed
 */
function partition(&$list,$start,$end)
{
    //取最后一个值做中间值
    $point = $list[$end];
    $mid = $start;//中间值的下标
    for ($i=$start;$i<$end;$i++){
        //小于中间值的则替换到下标的左边
        if($list[$i]<$point){
            $val = $list[$mid];
            $list[$mid] = $list[$i];
            $list[$i] = $val;
            $mid++;
        }
    }
    //将中间值放入中间位置
    $val = $list[$mid];
    $list[$mid] = $list[$end];
    $list[$end] = $val;
    return $mid;
}

//$list = [8,1,5,2,3,6,4,7];
//var_dump(QuickSort($list));


/**
 * 桶排序
 * 设置一个桶只能放入10个元素，如果桶内元素过多，则继续分桶
 * @author luojin
 * @time 2020-06-09
 * @param $list
 * @return array
 */
function BucketSort($list){
    $min = min($list);
    $max = max($list);
    $count = count($list);
    //将数据存入数组中所需要的下标
    $bucketNumber = ceil(($max-$min)/$count)+1;
    $buckets = [];
    foreach ($list as $v){
        //将数据放入不同的桶当中，这个算法可以根据具体的需求做出改变，作者的思路是直接使用王争老师案例的算法
        $key = ceil(($v-$min)/$count);
        $buckets[$key][] = $v;
    }
    $result = [];
    for ($i=0;$i<$bucketNumber;$i++){
        $bucket = $buckets[$i];
        $length = count($buckets[$i]);
        if($length == 0){
            continue;
        }
        if($length > 10){
            $bucket = BucketSort($bucket);
        }
        $bucket = QuickSort($bucket);
        $result = array_merge($result,$bucket);
    }
    return $result;
}

//$list = [11,23,45,67,88,99,22,34,56,78,90,12,34,5,6,91,92,93,93,94,95,94,95,96,97,98,99,100];
//var_dump(BucketSort($list));


/**
 * 计数排序
 * 这种排序不需要做数据的比较,将数据存放再一个数组里面做为key值，
 * 然后再将有相同的值做value值的加1，最终从小到大的输出数组即可。
 * @author luojin
 * @time 2020-06-10
 * @param $list
 * @return array
 */
function CountingSort($list)
{
    $max = max($list);
    $min = min($list);
    $data = [];
    for($i = $min; $i <= $max; $i++){
        $data[$i] = 0;

    }
    foreach ($list as $k=>$v){
        $data[$v] += 1;
    }

    $list = [];
    foreach ($data as $k=>$v){
        for ($i = 0; $i < $v; $i++){
            $list[] = $k;
        }
    }

    return $list;
}

//$list = [1,9,7,3,1,5,6,9,18,6,8,9];
//var_dump(CountingSort($list));

/**
 * 基数排序
 * 原理：通过个位、百位、千位数字的排序，最终生成排序
 * @author luojin
 * @time 2020-06-14
 * @param $list
 * @return array
 */
function RadixSort($list)
{
    $max = max($list);//最大值
    $length = strlen($max);//最长的数字，决定循环的次数
    //数字的左边填充0
    foreach ($list as $k=>$v){
        $list[$k] = str_pad($v,$length,0,STR_PAD_LEFT);
    }
    $CountingList = [];
    //进行个位、百位、千位的排序
    for ($i = ($length-1); $i >= 0; $i--){
        //将个位、百位、千位的数据取出，进行计数排序
        foreach ($list as $k=>$v){
            $val = substr($v,$i,1);
            $CountingList[$val][] = $v;
        }
        $list = [];
        //将个位、百位、千位排序好的数据放入数组中
        for ($j = 0; $j<10; $j++){
            if(isset($CountingList[$j])){
                foreach ($CountingList[$j] as $v){
                    $list[] = $v;
                }
            }

        }
        $CountingList = [];
    }
    foreach ($list as $k=>$v){
        $list[$k] = intval($v);
    }

    return $list;

}

$list=[1502670,1502671,1502672,1502673,150674,1502675,1502676,12677,2678,2679,1502680,11,1502682,1502683,1584,1502685,150286,152687,1502688,1502689,1690,15691,12692,1502693,15,12695,1502696,1502697,1502698,12699];
var_dump(RadixSort($list));




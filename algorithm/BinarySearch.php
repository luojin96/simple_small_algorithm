<?php
function getList(){
    $list = [];
    for($i = 1; $i < 100; $i++){
        $list[] = $i;
    }
    return $list;
};

/**
 * 二分查找
 * @author luojin
 * @time 2020-06-15
 * @param $val
 * @return false|float
 */
function BinarySearch($val){
    $list = getList();
    $length = count($list);
    return search($list, $val,0, ($length-1));
}

function search($list, $val, $min, $max)
{
    $mid = floor(($min+$max)/2);//获取中位数
    if($val == $list[$mid]){
        return $mid;
    }
    if($val > $list[$mid]){
        return search($list, $val, ($mid+1), $max);
    }else{
        return search($list, $val, $min, ($mid-1));
    }
}

//var_dump(BinarySearch(41));

/**
 * 用二分法查询第一个值等于给定元素的值
 * @author luojin
 * @time 2020-06-17
 * @param $list
 * @param $val
 * @return false|float
 */
function bsearch($list, $val)
{
    $count = count($list);
    return firstSearch($list, $val, 0, ($count-1));
}
function firstSearch($list, $val, $min, $max)
{
    $mid = floor(($min+$max)/2);//获取中位数
    //获取到数据
    if($list[$mid] == $val){
        //当数据是第一个数据时，跳出查询，返回数据
        if($mid == $min || $list[($mid-1)] < $val){
            return $mid;
        }else{
            //当该数据不是第一个给定的值，继续往前查询数据
            return firstSearch($list,$val,$min,($mid-1));
        }
    }

    //二分法查询数据在哪个区间
    if($list[$mid] > $val){
        return firstSearch($list,$val,$min,($mid-1));
    }else{
        return firstSearch($list,$val,($mid+1),$max);
    }
}
//$list = [0,1,2,2,3,4,5,5,5,5,6,7,8,9,9,10,10,13];
//echo bsearch($list,5);

/**
 * 用二分法查询最后一个值等于给定元素的值
 * @author luojin
 * @time 2020-06-17
 * @param $list
 * @param $val
 * @return false|float
 */
function lsearch($list, $val)
{
    $count = count($list);
    return lastSearch($list, $val, 0, ($count-1));
}
function lastSearch($list, $val, $min, $max)
{
    $mid = floor(($min+$max)/2);//获取中位数
    //获取到数据
    if($list[$mid] == $val){
        //当数据是最后一个数据时，跳出查询，返回数据
        if($mid == $max || $list[($mid+1)] > $val){
            return $mid;
        }else{
            //当该数据不是最后一个给定的值，继续往前查询数据
            return lastSearch($list,$val,($mid+1),$max);
        }
    }

    //二分法查询数据在哪个区间
    if($list[$mid] > $val){
        return lastSearch($list,$val,$min,($mid-1));
    }else{
        return lastSearch($list,$val,($mid+1),$max);
    }
}
//$list = [0,1,2,2,3,4,5,5,5,5,6,7,8,9,9,10,10,13];
//echo lsearch($list,5);


/**
 * 用二分法查询第一个大于等于给定值的元素
 * @author luojin
 * @time 2020-06-17
 * @param $list
 * @param $val
 * @return false|float|int|string
 */
function gsearch($list, $val)
{
    $count = count($list);
    return gtSearch($list, $val, 0, ($count-1));
}
function gtSearch($list, $val, $min, $max)
{
    $mid = floor(($min+$max)/2);//获取中位数
    //获取到数据
    if($list[$mid] >= $val){
        //当中位数的值是0或者前一位数据小于该值时，跳出循环，获取值
        if($mid == 0 || $list[$mid-1] < $val){
            return $mid;
        }else{
            return gtSearch($list,$val,$min,($mid-1));
        }
    }

    //二分法查询数据在哪个区间
    if($list[$mid] >= $val){
        return gtSearch($list,$val,$min,($mid-1));
    }else{
        return gtSearch($list,$val,($mid+1),$max);
    }
}
//$list = [0,1,2,2,3,4,5,5,5,5,6,7,8,9,9,10,10,13];
//echo gsearch($list,5);


/**
 * 用二分法查找最后一个小于等于给定值的元素
 * @author luojin
 * @time 2020-06-17
 * @param $list
 * @param $val
 * @return false|float|int|string
 */
function lsearchs($list, $val)
{
    $count = count($list);
    return ltSearch($list, $val, 0, ($count-1));
}
function ltSearch($list, $val, $min, $max)
{
    $mid = floor(($min+$max)/2);//获取中位数
    //获取到数据
    if($list[$mid] <= $val){
        //当中位数的值是最后一位或者后一位数据大于该值时，跳出循环，获取值
        if($mid == (count($list)-1) || $list[$mid+1] > $val){
            return $mid;
        }else{
            return ltSearch($list,$val,($mid+1),$max);
        }
    }

    //二分法查询数据在哪个区间
    if($list[$mid] > $val){
        return ltSearch($list,$val,$min,($mid-1));
    }else{
        return ltSearch($list,$val,($mid+1),$max);
    }
}
$list = [0,1,2,2,3,4,5,5,5,5,6,7,8,9,9,10,10,13];
echo lsearchs($list,2);
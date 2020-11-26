<?php

$list =[2,4,-7,5,2,-1,2,-4,3];

//参考资料：https://blog.csdn.net/ns_code/article/details/20942045  参考书籍：算法导论

/**
 * @authod luojin
 * @Notes 求最大子数组 暴力解决，从下标一开始到下标结尾，获取里面最大的的子数组 方法一
 * @time 2018年7月10日17:45:17
 * @email 1242773692@qq.com
 * @param array $list 数组
 * @return int
 */
function MaxSum1(array $list){
    $count = count($list);
    $maxSum = 0;
    for ($i=2;$i<$count;$i++){
        $max = 0;

        for ($j = $i;$j<$count;$j++){
            $max += $list[$j];
            //值最大则替换
            if($max > $maxSum)
                $maxSum = $max;
        }

    }

    return $maxSum;

}


/**
 * @authod luojin
 * @Notes 求最大子数组 采取的是归并方法中的对半切 方法二
 * @time 2018年7月10日17:17:44
 * @email 1242773692@qq.com
 * @param $list 数组
 * @param $start 开始下标
 * @param $end 最终下标
 * @return int
 */
function MaxSum(array &$list,$start,$end){
    //数组被划分成只有一个值时，若为正整数，返回该值
    if($start == $end){
        if($list[$start]>0)
            return $list[$start];
        return 0;
    }

    $mid = floor(($start+$end)/2);
    $maxLeftSum = 0;
    $maxLeft = 0;
    //求左边最大的值
    for ($i = $mid;$i>=$start;$i--){
        $maxLeft  += $list[$i];
        if($maxLeft>$maxLeftSum)
            $maxLeftSum = $maxLeft;
    }
    $maxRightSum = 0;
    $maxRight = 0;
    //求右边最大的值
    for ($i = ($mid+1);$i<=$end;$i++){
        $maxRight += $list[$i];
        if($maxRight>$maxRightSum)
            $maxRightSum = $maxRight;
    }

    //递归，将左边与右边继续细分，划分成只有一个值
    $maxLeft = MaxSum($list,$start,$mid);
    $maxRight = MaxSum($list,($mid+1),$end);

    return Max_($maxLeft,$maxRight,$maxLeftSum+$maxRightSum);
}

function Max_($a,$b,$c){
    $max = $a>$b?$a:$b;

    return $max>$c?$max:$c;
}

/**
 * @authod luojin
 * @Notes 求最大子数组 效率最高的方法，从数组开始时进行相加，若相加的值小于0，则说明现在的值与前面的值不能连接，则从0开始继续相加  方法三
 * @time 2018年7月10日17:49:57
 * @email 1242773692@qq.com
 * @param $list 数组
 * @return int
 */
function MaxSum3(array $list){
    $count = count($list);
    $maxSum = 0;
    $max = 0;
    for ($i=0;$i<$count;$i++){
        $max += $list[$i];
        //最大值小于0，说明不连接，从新相加
        if($max<0)
            $max = 0;
        //最大值
        if($max>$maxSum)
            $maxSum = $max;
    }
    return $maxSum;
}

$end = count($list)-1;
var_dump(MaxSum1($list));
//var_dump(MaxSum($list,0,$end));
//var_dump(MaxSum3($list));
?>
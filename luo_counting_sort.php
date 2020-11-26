<?php

$list = [3,3,3,5,9,7,7,8,6];
//参考书籍：算法导论
/**
 * 作者一开始以为计数算法，就是记录所有数值的个数。。算法复杂度岂不是n了，
 * 然后，恩，脑子不够用。。忘记顺序问题。。。然后再从新想，恩恩，差不多是这个思路，
 * 然后看下网上资料，恩应该没毛病。。
 */
//参考资料：http://www.yduba.com/biancheng-1362548964.html
/**
 * 计数排序是一个非基于比较的排序算法，该算法于1954年由 Harold H. Seward 提出。
 * 它的优势在于对一定范围内的整数排序时，它的复杂度为O(n+k)（其中k是整数的范围），
 * 快于任何比较排序算法。当然这是一种牺牲空间换取时间的做法，
 * 而且当O(k)>O(n*log(n))的时候其效率反而不如基于比较的排序
 * （基于比较的排序的时间复杂度在理论上的下限是O(n*log(n))，如归并排序，堆排序）
 */

/**
 * @authod luojin
 * @time 2018-7-19 09:23:16
 * @notes 计数排序
 * @email 1242773692@qq.com
 * @param array $list
 * @return array
 */
function CountingSort(array $list){
    $min = min($list);//最小值
    $max = max($list);//最大值
    $row = array();
    //赋值
    for ($i = $min;$i<=$max;$i++){
        $row[$i] = 0;
    }
    //计数
    for ($i = 0; $i < count($list); $i++){
        $row[$list[$i]] += 1;
    }
    //排序
    $list = array();
    foreach ($row as $k=>$val){
        for ($i=0;$i<$val;$i++){
            $list[] = $k;
        }
    }
    return $list;
}

var_dump(CountingSort($list));

?>
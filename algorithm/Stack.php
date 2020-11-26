<?php
/**
 * 通过栈的形式，实现四则运算
 * 原理，用两个栈，一个存放数字，一个存放运算符号，取出的运算符，比栈顶的运算符底或者相等，则取运算符进行计算
 * @param $str
 * @return mixed
 */
function expression($str){
    $str = str_replace(' ','',$str);
    $data = preg_split('/([\(\)\+|\-|\*|\/])/',$str,-1,PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);

    $numStack = [];  // 存放数字
    $operStack = []; // 存放运算符
    $operStack[] = NULL;

    for ($i = 0; $i < count($data); $i++){
        // 通过ASCII码判断是否是数字
        if(ord($data[$i]) >= 48 && ord($data[$i]) <= 57){
            array_push($numStack,$data[$i]);
            continue;
        }
        $count = count($operStack);
        switch ($data[$i]){
            case '+':
            case '-':
                //判断运算符栈顶的的元素比自己优先级高或者相等，则进行四则运算,否则进行入栈操作
                if($operStack[$count-1] == '+' || $operStack[$count-1] == '-' || $operStack[$count-1] == '*' || $operStack[$count-1] == '/'){
                    compute($numStack,$operStack);
                    $i--;
                }else{
                    array_push($operStack,$data[$i]);
                }
                break;
            case '*':
            case '/':
                //判断运算符栈顶的的元素比自己优先级高或者相等，则进行四则运算,否则进行入栈操作
                if($operStack[$count-1] == '*' || $operStack[$count-1] == '/'){
                    compute($numStack,$operStack);
                    $i--;
                }else{
                    array_push($operStack,$data[$i]);
                }

                break;
            case '(':
                //左括号进行入栈操作
                array_push($operStack,$data[$i]);
                break;
            case ')':
                //判断是否是左括号，如果是，则将左括号出栈，不是则进行四则运算
                if($operStack[$count-1] == '('){
                    array_pop($operStack);
                }else{
                    compute($numStack,$operStack);
                    if($count>1){
                        $i--;
                    }

                }
                break;
        }
    }

    //判断运算符是否全部计算完，如果没有，则依次取出进行四则运算
    for ($i=1;$i<count($operStack);){
        compute($numStack,$operStack);
    }
    return $numStack[0];
}

/**
 * 数字的四则运算
 * @param $numStack
 * @param $operStack
 */
function compute(&$numStack,&$operStack){
    $v = array_pop($operStack);
    $num1 = array_pop($numStack);
    $num2 = array_pop($numStack);
    switch ($v){
        case '+':
            array_push($numStack,$num1+$num2);
            break;
        case '-':
            array_push($numStack,$num2-$num1);
            break;
        case '*':
            array_push($numStack,$num2*$num1);
            break;
        case '/':
            array_push($numStack,$num2/$num1);
            break;
    }

}

echo expression('3+(5+4*3-4/4)+5');

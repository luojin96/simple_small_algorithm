<?php

/**
 * 数组实现队列，当队列没有空闲时间在进行搬移操作，这样就不需要每次出队的时候进行数据搬移操作
 * 队空为头下标等于尾下标，队满为尾下标减去头下标的值等于队列的长度
 * @author luojin
 * @time 2020-06-01
 * Class ArrayQueue
 */
class ArrayQueue
{
    public $list=[];//队列
    private $count = 5;//队列的长度
    private $head = 0;//队列头下标
    private $tail = 0;//队列尾下标
    //入队操作
    public function enqueue($item)
    {
        $dValue = $this->tail-$this->head;//队列的大小
        //队满
        if($dValue == $this->count){
            return false;
        }
        if($this->tail == $this->count){

            for ($i = 0; $i<$dValue; $i++){
                $this->list[$i] = $this->list[($this->head+$i)];
            }
            //跟新队列的头下标和尾下标
            $this->tail = $dValue;
            $this->head = 0;
        }
        $this->list[$this->tail] = $item;
        $this->tail++;
        return true;
    }

    //出队操作
    public function dequeue()
    {
        if($this->head == $this->tail){
            return null;
        }
        $val = $this->list[$this->head];
        ++$this->head;
        return $val;
    }

}

//$arrayQueue = new ArrayQueue();
//$arrayQueue->enqueue(1);
//$arrayQueue->enqueue(2);
//$arrayQueue->enqueue(3);
//$arrayQueue->enqueue(4);
//$arrayQueue->enqueue(5);
//echo $arrayQueue->dequeue().PHP_EOL;
//$arrayQueue->enqueue(1);
//echo $arrayQueue->dequeue().PHP_EOL;
//echo $arrayQueue->dequeue().PHP_EOL;
//echo $arrayQueue->dequeue().PHP_EOL;
//echo $arrayQueue->dequeue().PHP_EOL;
//echo $arrayQueue->dequeue().PHP_EOL;
//echo $arrayQueue->dequeue().PHP_EOL;

/**
 * 循环队列，队空判断为头下标等于尾下标，队满判断为当尾下标加1等于头下标则队满，队列会存在一个位置的浪费
 * @author luojin
 * @time 2020-06-01
 * Class CircularQueue
 */
class CircularQueue
{
    public $list;//队列
    private $count = 5;//队列长度
    private $head = 0;//队列头下标
    private $tail = 0;//队列尾下标

    //入队
    public function enqueue($item)
    {
        //新的队尾下标，当尾下标等于队列长度时，将下标从头开始
        $newTail = ($this->tail + 1) == $this->count ? 0 : ($this->tail + 1);
        //当新的队尾下标等于头下标时，队满
        if($newTail == $this->head){
            return false;
        }
        $this->list[$this->tail] = $item;
        $this->tail = $newTail;
        return true;
    }

    //出队
    public function dequeue()
    {
        if($this->head == $this->tail){
            return null;
        }
        $val = $this->list[$this->head];
        //循环队列，当头下标等于队列长度时，将下标从头开始
        $this->head = ($this->head+1) == $this->count ? 0 : ($this->head+1);
        return $val;
    }
}

$circularQueue = new CircularQueue();
$circularQueue->enqueue(1);
$circularQueue->enqueue(2);
$circularQueue->enqueue(3);
$circularQueue->enqueue(4);
echo $circularQueue->dequeue().PHP_EOL;
$circularQueue->enqueue(5);
echo $circularQueue->dequeue().PHP_EOL;
$circularQueue->enqueue(6);
echo $circularQueue->dequeue().PHP_EOL;
echo $circularQueue->dequeue().PHP_EOL;
echo $circularQueue->dequeue().PHP_EOL;
echo $circularQueue->dequeue().PHP_EOL;
$circularQueue->enqueue(1);
echo $circularQueue->dequeue().PHP_EOL;


<?php
//工厂模式

/**
 * 参考书籍：大话数据结构  参考博客：https://baijunyao.com/article/162
 *
 */


/**
 * Class Calculator
 * @authod luojin
 * @time 2018年8月3日14:04:42
 */
abstract class Calculator{
    private $numberA;
    private $numberB;

    public function getNumberA(){
        return $this->numberA;
    }
    public function setNumberA($numberA){
        $this->numberA = $numberA;
    }

    public function getNumberB(){
        return $this->numberB;
    }
    public function setNumberB($numberB){
        $this->numberB = $numberB;
    }

    abstract function getResult();
}

//加
class Add extends Calculator{

    public function getResult()
    {
        // TODO: Implement getResult() method.
        return $this->getNumberA()+$this->getNumberB();
    }
}

//减
class Reduce extends Calculator{
    public function getResult()
    {
        // TODO: Implement getResult() method.
        return $this->getNumberA()-$this->getNumberB();
    }
}

//乘
class Ride extends Calculator{
    public function getResult()
    {
        // TODO: Implement getResult() method.
        return $this->getNumberA() * $this->getNumberB();
    }
}

//除
class Except extends Calculator{
    public function getResult()
    {
        if($this->getNumberB() == 0){
            return '除数不能为0';
        }
        // TODO: Implement getResult() method.
        return $this->getNumberA() / $this->getNumberB();
    }
}

/**
 * Interface IFactorys
 * @authod luojin
 * @time 2018年8月3日14:06:42
 * @notes 工厂接口
 */
interface IFactorys{
    public function create();
}

//加
class AddFctory implements IFactorys{
    public function create()
    {
        // TODO: Implement create() method.
        return new Add();
    }

}

//减
class ReduceFctory implements IFactorys{
    public function create()
    {
        // TODO: Implement create() method.
        return new Reduce();
    }
}

//乘
class RideFctory implements IFactorys{
    public function create()
    {
        // TODO: Implement create() method.
        return new Ride();
    }
}

//除
class ExceptFctory implements IFactorys{
    public function create()
    {
        // TODO: Implement create() method.
        return new Except();
    }
}
//实例化具体工厂
$addFctory = new AddFctory();
//实例化工厂的操作
$add = $addFctory->create();
$add->setNumberA(2);
$add->setNumberB(5);

echo $add->getResult();
<?php
//参考书籍：深入PHP面向对象、模式与实践、大话数据结构

/**
 * @authod luojin
 * @notes 策略模式 (定义一系列算法，将每个算法封装到具有公共接口的一系列策略类中，
 *                 从而使它们可以相互替换，并让算法可以在不影响到客户端的情况下发生变化。)
 * @time 2018-7-25 08:54:00
 * @email 1242773692@qq.com
 */


//定义通用策略的接口
interface people
{
    public function describe();
}

class yellowPeople implements people
{
    public function describe()
    {
        // TODO: Implement describe() method.
        return "黄种人";
    }
}

class blackPeople implements people
{
    public function describe()
    {
        // TODO: Implement describe() method.
        return "黑人";
    }
}

class whitePeople implements people
{
    public function describe()
    {
        // TODO: Implement describe() method.
        return "白人";
    }
}

//客户端代码
class person
{

    private $people;

    public function setPeople(people $people)
    {
        $this->people = $people;
    }

    public function getDescribe()
    {
        return $this->people->describe();
    }
}

//这里可以通过不同的赋值，获取不同的策略类里面的方法
$person = new person();
$person->setPeople(new whitePeople());
print_r("这个是：".$person->getDescribe()."</br>");

$person->setPeople(new yellowPeople());
print_r("这个是：".$person->getDescribe()."</br>");

$person->setPeople(new blackPeople());
print_r("这个是：".$person->getDescribe());



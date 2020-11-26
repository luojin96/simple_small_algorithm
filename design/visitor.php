<?php
//参考资料：https://segmentfault.com/a/1190000004513278   参考书籍：深入PHP面向对象、模式与实践
/**
 * @authod luojin
 * @Notes 访问者模式设计
 * @time 2018年7月10日22:30:23
 * @email 1242773692@qq.com
 */


//被访问者，基础类
abstract class Unit
{
    abstract function getName();

    //这个方法是访问者模式中的重点，即接受访问者，并且将自身传入访问者中。
    public function accept(vistor $vistor){
        $method = 'vistor'.ucwords(get_class($this));

        if(method_exists($vistor,$method)){
            $vistor->$method($this);
        }else{
            echo '不存在该方法';
        }
    }
}
//实现被访问者的具体内容
class face extends Unit
{
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'is face';
    }
}
//实现被访问者的具体内容
class eyes extends Unit
{
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'is eyes';
    }
}
//实现被访问者的具体内容
class noes extends Unit
{
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'is noes';
    }
}

//访问者类，主要写出需要实现哪些功能
interface vistor
{
    public function vistorFace(face $face);
    public function vistorEyes(eyes $eyes);
    public function vistorNoes(noes $noes);
}

//实现访问者类
class childVistor implements vistor
{
    public function vistorFace(face $face)
    {
        // TODO: Implement vistorFace() method.
        echo 'This '.$face->getName()."</br>";
    }

    public function vistorEyes(eyes $eyes)
    {
        // TODO: Implement vistorEyes() method.
        echo 'This '.$eyes->getName()."</br>";
    }

    public function vistorNoes(noes $noes)
    {
        // TODO: Implement vistorNies() method.
        echo 'This '.$noes->getName()."</br>";
    }

}

//用来测试访问者模式的过程
class person
{
    private $list;

    public function add(Unit $unit)
    {
        $this->list[] = $unit;
    }

    public function accept(vistor $vistor){
        foreach ($this->list as $val){
            $val->accept($vistor);
        }
    }

}
//添加访问者
$person = new person();
$person->add(new face());
$person->add(new eyes());
$person->add(new noes());

//调用被访者者
$childVistor = new childVistor();
$person->accept($childVistor);

?>
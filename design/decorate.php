<?php
//装饰者模式
abstract class people
{
    private $name;
    abstract function describe();
}

class person extends people
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    function describe()
    {
        // TODO: Implement describe() method.
        return "这是一个人";
    }
}

class eyes extends person
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    function describe(){
        return $this->name->describe()."<br>一双眼睛";
    }
}

class head extends person{
    public $name;
    public function __construct($name)
    {
        $this->name  = $name;
    }

    function  describe(){
        return $this->name->describe()."<br>一个头";
    }
}

$people = new person("张三");

$people = new eyes($people);

$people = new head($people);

print_r($people->describe());
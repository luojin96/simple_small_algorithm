<?php
//访问者模式
interface IPerson
{
    public function head();
    public function eyes();
    public function noes();
}

class dummy implements IPerson
{
    private $people;
    public function __construct(people $people)
    {
        $this->people = $people;
    }

    public function head()
    {
        // TODO: Implement head() method.
        return $this->people->getName().'做了个头';
    }

    public function eyes()
    {
        // TODO: Implement eyes() method.
        return $this->people->getName().'做了一双眼睛';
    }

    public function noes()
    {
        // TODO: Implement noes() method.
        return $this->people->getName().'做了一个鼻子';
    }

}

class people
{
    private $name;

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

class proxy implements IPerson{
    public $dummy;//

    public function __construct(people $people)
    {
        $this->dummy = new dummy($people);
    }

    public function head()
    {
        // TODO: Implement head() method.
        return $this->dummy->head();
    }

    public function eyes()
    {
        // TODO: Implement eyes() method.
        return $this->dummy->eyes();
    }

    public function noes()
    {
        // TODO: Implement noes() method.
        return $this->dummy->noes();
    }
}

$people = new people();
$people->setName("张三");

$proxy = new proxy($people);
print_r($proxy->head()."<br>");
print_r($proxy->eyes()."<br>");
print_r($proxy->noes()."<br>");

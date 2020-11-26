<?php
//工厂模式

//interface IObligation
//{
//    public function sweep();
//    public function WashClothes();
//    public function cook();
//}

class LeiFeng //Realization
{
    public function sweep()
    {
        return '扫地';
    }

    public function WashClothes()
    {
        return '洗衣服';
    }

    public function cook()
    {
        return '做饭';
    }
}

class student extends LeiFeng
{

}

class Volunteer extends LeiFeng
{

}

interface IFactory
{
    public function createLeiFeng();
}

class studyStudent implements IFactory
{
    public function createLeiFeng()
    {
        // TODO: Implement createLeiFeng() method.
        return new student();
    }

}

class studyVolunteer implements IFactory
{
    public function createLeiFeng()
    {
        // TODO: Implement createLeiFeng() method.
        return new Volunteer();
    }
}

$student = new studyStudent();

echo $student->createLeiFeng()->cook()."<br>";
echo $student->createLeiFeng()->WashClothes()."<br>";
echo $student->createLeiFeng()->sweep();
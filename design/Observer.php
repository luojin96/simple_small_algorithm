<?php
//观察者模式
interface ITrainTicketObserver{
    //发送消息功能
    public function send();
}
//被观察者
interface ITrainTicketObservable{
    //添加观察者
    public function addObserver(ITrainTicketObserver $obs);
    //购票
    public function BuyTickets();
}
//短信通知
class SMSObserver implements ITrainTicketObserver{
    public function send()
    {
        // TODO: Implement send() method.
        echo '短信通知用户逻辑实现</br>';
    }
}
//app消息通知
class APPObserver implements ITrainTicketObserver{
    public function send()
    {
        // TODO: Implement send() method.
        echo 'app通知用户的逻辑实现</br>';
    }
}
class TrainTicketObservable implements ITrainTicketObservable{
    private $Observer;
    //实现添加观察者
    public function addObserver(ITrainTicketObserver $obs)
    {
        // TODO: Implement addObserver() method.
        $this->Observer[] = $obs;
    }

    //实现买票
    public function BuyTickets()
    {
        // TODO: Implement BuyTickets() method.
        echo '买票功能逻辑实现</br>';
        //实现所有观察者的功能
        foreach ($this->Observer as $k=>$v){
            $v->send();
        }
    }
}
class Client{
    public function run(){
        $buyTicket = new TrainTicketObservable();
        $buyTicket->addObserver(new SMSObserver());
        $buyTicket->addObserver(new APPObserver());
        //调用买票功能
        $buyTicket->BuyTickets();
    }
}
$client = new Client();
$client->run();
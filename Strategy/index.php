<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 10:18
 */

namespace app\Strategy;


require __DIR__.'/../vendor/autoload.php';

class Client{

    public function run(){
        $ShareContext = new ShareContext();
        $share = $ShareContext->getShareTarget(1);
        //获取WechatShare对象
        $qqShare = $share->getShare();
        print_r($qqShare->showTitle()."</br>");
        print_r($qqShare->showContent()."</br>");
        print_r($qqShare->showImageUrl()."</br>");
        print_r($qqShare->showLink()."</br>");
    }
}

$dd = new Client();
$dd->run();


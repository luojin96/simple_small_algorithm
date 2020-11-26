<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 10:00
 */

namespace app\Strategy;


class WechatShareContext extends ShareContext
{
    public function __construct()
    {
        $this->setShare(new WechatShare());
    }

}
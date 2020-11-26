<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 14:21
 */

namespace app\Strategy;


class QQShareContext extends ShareContext
{
    public function __construct()
    {
        $this->setShare(new QQShare());
    }

}
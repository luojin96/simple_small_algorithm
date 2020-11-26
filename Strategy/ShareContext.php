<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12
 * Time: 17:21
 */

namespace app\Strategy;

use ReflectionClass;
use ReflectionException;

class ShareContext
{
    private $Share;
    private $namespace = 'app\Strategy\\';
    private $db;
    public function __construct()
    {
        $config = include 'config.php';
        $this->db = $config['driver'];

    }

    public function setShare(IShare $IShare){
        $this->Share = $IShare;
    }

    public function getShare(){
        return $this->Share;
    }


    public function getShareTarget($int){
        $className = $this->namespace . $this->db[$int] . 'ShareContext';
        try{
            $class = new ReflectionClass($className);

            $shareClass = $class->newInstance();

            return $shareClass;
        }catch (ReflectionException $exception){
            throw new \InvalidArgumentException('暂不支持的分享类型');
        }

    }



}
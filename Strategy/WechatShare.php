<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12
 * Time: 16:14
 */


namespace app\Strategy;
class WechatShare implements IShare{
    private $config;
    public function __construct()
    {
        $this->config = include 'config.php';
    }

    public function showTitle($int = 0)
    {
        // TODO: Implement showTitle() method.
        $wechat = $this->config['Wechat'];
        echo $wechat[$int]['title'];
    }
    public function showContent($int = 0)
    {
        // TODO: Implement showContent() method.
        $wechat = $this->config['Wechat'];
        echo $wechat[$int]['content'];
    }
    public function showImageUrl($int = 0)
    {
        // TODO: Implement showImageUrl() method.
        $wechat = $this->config['Wechat'];
        echo $wechat[$int]['imageUrl'];
    }
    public function showLink($int = 0)
    {
        // TODO: Implement showLink() method.
        $wechat = $this->config['Wechat'];
        echo $wechat[$int]['link'];
    }
}


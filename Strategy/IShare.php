<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 13:45
 */

namespace app\Strategy;


interface IShare
{
    /**
     * 标题
     * @param $int
     * @return mixed
     */
    public function showTitle($int);

    /**
     * 内容
     * @param $int
     * @return mixed
     */
    public function showContent($int);

    /**
     * 分享图标
     * @param $int
     * @return mixed
     */
    public function showImageUrl($int);

    /**
     * 分享链接
     * @param $int
     * @return mixed
     */
    public function showLink($int);
}
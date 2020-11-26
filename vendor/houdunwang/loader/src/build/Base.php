<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace houdunwang\loader\build;

use houdunwang\config\Config;

class Base
{
    // 类库映射
//    protected $alias = [];

    /**
     * 初始化
     */
    public function bootstrap()
    {
        //导入类库别名
//        $this->addMap(Config::get('loader.alias'));
        //自动加载文件
        $this->autoloadFile();
    }

    /**
     * 注册自动加载机制
     * @param string $autoload
     *
     * @return $this
     */
    public static function register($autoload = '')
    {
//        spl_autoload_register($autoload ? $autoload : [\houdunwang\framework\build\Base::class, 'autoload']);
    }

    //自动加载文件
    public function autoloadFile()
    {
        foreach (Config::get('loader.auto_load_file') as $f) {
            if (is_file($f)) {
                include $f;
            }
        }
    }
}
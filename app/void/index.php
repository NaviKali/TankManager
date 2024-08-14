<?php

namespace app\void;

use tank\BaseController;
use function tank\getAPPJSON;


class index extends BaseController
{

    /**
     * 获取标题名称
     * @string
     */
    public function getTitle()
    {
        $appjson = (array)getAPPJSON();
        header("Content-Type:text/html");
        return $appjson["Title"];
    }
}
<?php

namespace app\void;

use tank\BaseController;
use function tank\getAPPJSON;
use app\model\User as ModelUser;


class index extends BaseController
{

    /**
     * 获取标题名称
     * @access public
     * @return string
     */
    public function getTitle(): string
    {
        $appjson = (array) getAPPJSON();
        header("Content-Type:text/html");
        return $appjson["Title"];
    }

}
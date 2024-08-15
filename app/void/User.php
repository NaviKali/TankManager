<?php

namespace app\void;
use tank\BaseController;
use app\model\User as ModelUser;
use tank\Admin\LocalhostDictionary;
class User extends BaseController
{
    /**
     * 获取用户信息
     * @access public
     * @return object|array
     */
    public function getUserInfo(): object|array
    {
        $info = (new ModelUser())->where(["login_guid" => $_SESSION["Login"]["login_guid"]])->Once();
        $info["user_sex"] = (new LocalhostDictionary())->getKey("user_sex", $info["user_sex"]);
        return $info;
    }
}
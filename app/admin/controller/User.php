<?php

namespace app\admin\controller;

use tank\BaseController;
use app\model\User as ModelUser;
use tank\Request\Request;
use function tank\{BathVerParams, VerificationInclude};

class User extends BaseController
{
    /**
     * 验证用户是否填写用户表
     * @author liulei
     * @access public
     * @api User/VerUserWirteUserTable
     * @see @param app\verification\User.php["ver"]
     * @param Request $request
     * @return array
     */
    public function VerUserWirteUserTable(Request $request): array
    {
        BathVerParams("POST", VerificationInclude("User")['ver']);
        $params = $request->postparam();
        $find = (new ModelUser())->where(["login_guid" => $params["login_guid"]])->Once();
        if (!$find)
            return $this->throwWarning("当前用户并没有填写用户表");
        return $this->throwSuccess("当前用户已填写用户表！");
    }
    /**
     * 新用户填写用户信息表
     * @author liulei
     * @access public
     * @api User/NewUserWriteUserTable
     * @see @param app\verification\User.php["new"]
     * @param Request $request
     * @return array
     */
    public function NewUserWriteUserTable(Request $request): array
    {
        BathVerParams("POST", VerificationInclude("User")['new']);
        $params = $request->postparam();
        //*转字典
        $params["user_sex"] = $this->useDictionary($params["user_sex"]);

        (new ModelUser())->Modelcreate([$params['login_guid'],$params['user_name'],$params['user_sex'],$params['user_phone']]);
        return $this->throwSuccess("填写成功！");
    }
}
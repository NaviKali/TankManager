<?php

namespace app\admin\controller;

use tank\BaseController;
use tank\Func\Func;
use tank\Request\Request;
use app\model\Login as ModelLogin;
use app\model\User as ModelUser;
use function tank\BathVerParams;
use function tank\VerificationInclude;

class Login extends BaseController
{
    /**
     * 注册登录账号
     * @author liulei
     * @access public
     * @api Login/RegistrationAccount
     * @see @param app\verification\Login.php["registration"]
     * @param Request $request
     * @return array
     * @date 2024-08-10
     */
    public function RegistrationAccount(Request $request): array
    {
        BathVerParams("POST", VerificationInclude('Login')["registration"]);
        $params = $request->postparam();
        (new ModelLogin())->Modelcreate([$params['login_user'], $params['login_password']]);
        return $this->throwSuccess("添加成功！");
    }
    /**
     * 账号密码登录
     * @access public
     * @author liulei
     * @api Login/AccountLogin
     * @param Request $request look down
     * @return mixed
     * @date 2024-08-10
     */
    public function AccountLogin(Request $request):mixed
    {
      return Func::SingleVerCallFunction("LOGIN", __FUNCTION__, function () {
        }, [
            'login_user',
            'login_password',
            true
        ]);
    }


}
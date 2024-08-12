<?php

namespace app\admin\controller;

use tank\BaseController;
use tank\Func\Func;
use tank\Request\Request;
use app\model\Login as ModelLogin;
use app\model\User as ModelUser;
use function tank\BathVerParams;
use function tank\VerificationInclude;
use tank\Admin\LocalhostAdmin;



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
     * 免密登录
     * @author liulei
     * @access public
     * @api Login/ConfidentialityLogin
     * @see @param app\verification\Login.php["confidentiality"]
     * @param Request $request
     * @return mixed
     * @date 2024-08-12
     */
    public function ConfidentialityLogin(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude('Login')["confidentiality"]);
        $params = $request->postparam();
        if ((new LocalhostAdmin)->LocalhostAdminLogin($params["user"], "123456789"))
            return $this->throwSuccess("登录成功！");
        else
            return $this->throwWarning("登录失败！");
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
    public function AccountLogin(Request $request): mixed
    {
        return Func::SingleVerCallFunction("LOGIN", __FUNCTION__, function () {
        }, [
            'login_user',
            'login_password',
            true
        ]);
    }


}
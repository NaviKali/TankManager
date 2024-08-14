<?php

namespace app\admin\controller;

use tank\BaseController;

use tank\Request\Request;
use function tank\VerificationInclude;
use function tank\BathVerParams;
use app\model\Menu as ModelMenu;

class Menu extends BaseController
{
    /**
     * 添加菜单
     * @access public
     * @api Menu/AddMenu
     * @see @param app\verification\Menu.php["add"]
     * @param Request $request
     * @return mixed
     */
    public function AddMenu(Request $request): mixed
    {
        BathVerParams("POST", VerificationInclude("Menu")['add']);
        $params = $request->getValue();
        (new ModelMenu())->Modelcreate($params);
        return $this->throwSuccess("添加成功！");
    }
}
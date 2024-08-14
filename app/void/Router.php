<?php

namespace app\void;

use tank\BaseController;
use tank\View\View;
use function tank\getMediaWidth;
use function tank\getAPPJSON;
use app\model\Menu as ModelMenu;
use tank\Admin\LocalhostDictionary;

class Router extends BaseController
{
    /**
     * 登录页
     * @return void
     */
    public function LoginPage()
    {
        $appjson = (array) getAPPJSON();
        //*获取登录类型列表
        $typeList = (new LocalhostDictionary())->ReadFileDic("login_type");
        View::MediaView([
            ["PC/login", ['title' => $appjson["Title"], 'copyright' => $appjson["Title"] . " from " . date("Y"), 'login_type_list' => $typeList, 'view' => ["width" => getMediaWidth(), "to" => "IOS_login"]], ['title' => "登录页"]],
            ["IOS/login", ['title' => $appjson["Title"]], ['title' => "登录页"]],
        ]);
    }
    /**
     * 进入index 中的 首页
     * @return void
     */
    public function indexPage()
    {
        $appjson = (array) getAPPJSON();

        /**
         * 获取菜单列表
         */
        $getMenuList = (new ModelMenu())->where(["menu_father_guid" => ""])->field([
            'menu_guid',
            'menu_name',
            'menu_to',
            'menu_father_guid',
            'menu_create_time',
        ])->select();
        $getMenuList = array_filter($getMenuList, function ($v) {
            $v->children = (new ModelMenu())->where(["menu_father_guid" => $v->menu_guid])->field([
                'menu_guid',
                'menu_name',
                'menu_to',
                'menu_father_guid',
            ])->select();
            return $v;
        });

        View::MediaView([
            ["PC/index", ['menu' => $getMenuList, 'view' => ["width" => getMediaWidth(), "to" => "IOS/index"]], ['title' => $appjson["Title"]]],
            ["IOS/index", ['menu' => $getMenuList], ['title' => $appjson["Title"]]],
        ]);
    }
}
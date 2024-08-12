<?php

namespace app\void;

use tank\BaseController;
use tank\View\View;

class Router extends BaseController
{
    /**
     * 登录页
     * @return void
     */
    public function LoginPage()
    {
        View::MediaView([
            ["PC/login", ['title' => "Tank后台管理系统", 'copyright' => "Tank后台管理系统 from " . date("Y"), 'view' => ["width" => 800, "to" => "IOS/login"]], ['title' => "登录页"]],
            ["IOS/login", [], ['title' => "登录页"]],
        ]);
    }
    /**
     * 首页
     * @return void
     */
    public function HomePage()
    {
        View::MediaView([
            ["PC/home", ['view' => ["width" => 800, "to" => "IOS/home"]], ['title' => "首页"]],
            ["IOS/home", [], ['title' => "首页"]],
        ]);
    }
}
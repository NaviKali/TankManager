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
            ["PC/login",['view'=>["width"=>800,"to"=>"IOS/login"]],['title'=>"登录页"]],
            ["IOS/login",[],['title'=>"登录页"]],
        ]);
    }
}
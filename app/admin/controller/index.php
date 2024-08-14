<?php

namespace app\admin\controller;

use tank\BaseController;

use tank\Admin\LocalhostAdmin;
use function tank\getAPPJSON;

class index extends BaseController
{
    public function index()
    {
        
        $appjson = (array) getAPPJSON();
        var_dump((new LocalhostAdmin())->LocalhostAdminLogin("liulei","123456789"));
    }
}
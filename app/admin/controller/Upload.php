<?php

namespace app\admin\controller;
use tank\BaseController;
use tank\Request\Request;
use tank\Upload\Upload as UP;
use function tank\BathVerParams;
use function tank\getPublicUrl;

class Upload extends BaseController
{
    /**
     * 文件上传
     * @access public
     * @api Upload/Upload
     * @author liulei
     * @param Request $request look down
     * @return mixed
     * @date 2024-08-13
     */
    public function Upload(Request $request): mixed
    {
        BathVerParams("POST", [
            "upload_name|文件名|require" => "None",
            "upload_data|Base文件内容|require" => "None",
            "upload_type|文件类型|require" => "None",
        ]);
        $params = $request->postparam();
        (new UP($params["upload_name"], $params["upload_type"]))->Base64Upload($params['upload_data']);
        return $this->throwSuccess("上传成功！", [
            "file" => $params['upload_name'] . "." . $params["upload_type"],
            "url" => "http://localhost:8080/public/upload/" . $params['upload_name'] . "." . $params["upload_type"],
        ]);
    }
}
<?php

#|----------------------------------|
#|       WECLOME TANK               |
#|     I LIKE PHP FROM THIS         |
#|      @email 2149573631@qq.com    |
#|----------------------------------|


/**
 * 视图层配置
 */
return [
    /**
     * 静态文件路径
     * TODO快速引入本地文件。
     * !请采取用符号的形式来定义路径。
     */
    "StaticFileUrl" => [
        "#css#" => "http://localhost:8080/public/static/css/",
        "#js#" => "http://localhost:8080/public/static/js/",
        "#img#" => "http://localhost:8080/public/static/image/",
        "#upload#" => "http://localhost:8080/public/upload/",
        "#iframe#" => "http://localhost:8080/views/",
        "#request#" => "http://localhost:8080/public/app/admin.php/",
        "#service#" => "http://localhost:8080/public/static/js/service/",
    ],
    /**
     * 自定义标签
     * TODO创建属于自己的标签
     * !推荐采取格式->标签头:标签| . 标签尾:|标签
     */
    "CustomLabel" => [],
];
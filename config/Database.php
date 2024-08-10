<?php

namespace config;

/**
 * (配置)MongoDB数据库
 */
use tank\Env\env;


class SQL
{
        /**
         * 数据库类型选择
         * @var array
         */
        public static $ConnectSQL =
                [
                        /* 数据库类型 */
                        /**
                         * All[支持全部数据库连接]
                         */
                        "SQLType" => "MongoDB",

                ];
        /**
         * MongoDB数据库配置
         * @var array
         */
        public static $MongoDB =
                [
                        /* 数据库地址 */
                        "SQLLocalhost" => "localhost",
                        /* 数据库端口 */
                        "SQLPort" => 27017,
                        /* 数据库名称 */
                        "SQLDatabaseName" => "TankManager",
                ];
        /**
         * MySQL数据库配置
         * @var array
         */
        public static $MySQL =
                [
                        /* 数据库地址 */
                        "SQLLocalhost" => "localhost",
                        /* 数据库端口 */
                        "SQLPort" => 3305,
                        /* 数据库名称 */
                        "SQLDatabaseName" => "demo",
                        /* MySQL用户 */
                        "MySQL_User" => "root",
                        /* MySQL密码 */
                        "MySQL_PassWord" => "root",
                ];

}


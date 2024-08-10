<?php
/**
 * 登录
 */
namespace app\model;

use tank\Request\Request;
use tank\Error\error;

class Login extends \tank\MD\MD
{

        /**Key绑定 */
        public static $Key = "login_id";
        /**Guid绑定 */
        public static $Guid = ["login_guid", "login_password"];
        /**显示字段 */
        public static $field = [
                'login_user' => self::SHOW,
                'login_password' => self::SHOW,
        ];
        /**写入字段 */
        public static $writefield = [
                'login_user' => "账号",
                'login_password' => "密码",
        ];
        /**开启软删除 */
        public static $OpenSoftDelete = true;
        /**软删除字段 */
        public static $SoftDeleteField = 'login_delete_time';
        /**开启其余字段写入 */
        public static $OpenOtherWriteField = true;
        /**其余字段写入 */
        public static $OtherWriteField = [
                'create' => "login_create_time",
                'update' => "login_update_time",
        ];
        /**开启业务姓名字段写入 */
        public static $UserNameWriteField = true;
        /* 默认业务姓名字段 */
        public const DEFAULTUSERNAME = 'User';
        /**默认业务姓名字段值 */
        public const DEFAULTUSERNAMEVALUE = "admin";
        /**
         * 添加前
         */
        public static function onBeforeCreate()
        {
                $params = Request::postparam();
                if ((new Login())->where(['login_user' => $params["login_user"], 'login_password' => $params["login_password"]])->select())
                        error::create("已存在该账号！");
        }
        /**
         * 添加后
         */
        public static function onAfterCreate()
        {
        }
        /**
         * 修改前
         */
        public static function onBeforeUpdate()
        {
        }
        /**
         * 修改后
         */
        public static function onAfterUpdate()
        {

        }
        /**
         * 删除前
         */
        public static function onBeforeDelete()
        {

        }
        /**
         * 删除后
         */
        public static function onAfterDelete()
        {

        }
        /**
         * 查询前
         */

        public static function onBeforeSelect()
        {

        }
        /**
         * 查询后
         */
        public static function onAfterSelect()
        {

        }

}
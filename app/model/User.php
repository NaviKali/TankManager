<?php
/**
 * 模型层模拟
 */
namespace app\model;

use tank\Admin\LocalhostDictionary;
use tank\Request\Request;
use function tank\Error;

class User extends \tank\MD\MD
{

        /**Key绑定 */
        public static $Key = "user_id";
        /**Guid绑定 */
        public static $Guid = ["user_guid", "user_name"];
        /**显示字段 */
        public static $field = [
                'user_name' => self::SHOW,
                'user_sex' => self::SHOW,
                'user_phone' => self::SHOW,
                'user_avatar' => self::SHOW,
                'user_create_time' => self::SHOW,
        ];
        /**写入字段 */
        public static $writefield = [
                'login_guid' => "用户登录Guid",
                'user_name' => "用户姓名",
                'user_sex' => "用户性别",
                'user_phone' => "用户手机号",
                'user_avatar' => "用户头像",
        ];
        /**开启软删除 */
        public static $OpenSoftDelete = true;
        /**软删除字段 */
        public static $SoftDeleteField = 'user_delete_time';
        /**开启其余字段写入 */
        public static $OpenOtherWriteField = true;
        /**其余字段写入 */
        public static $OtherWriteField = [
                'create' => "user_create_time",
                'update' => "user_update_time",
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
                if ((new User())->where(["login_guid" => $params["login_guid"]])->select()) {
                        Error("当前用户表格填写已存在！");
                        die;
                }
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
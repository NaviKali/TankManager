<?php
/**
 * 菜单
 */
namespace app\model;

class Menu extends \tank\MD\MD
{

    /**Key绑定 */
    public static $Key = "menu_id";
    /**Guid绑定 */
    public static $Guid = ["menu_guid", "menu_name"];
    /**显示字段 */
    public static $field = [
        'menu_guid' => self::SHOW,
        'menu_name' => self::SHOW,
        'menu_to' => self::SHOW,
        'menu_father_guid' => self::SHOW,
        'menu_create_time' => self::SHOW,
    ];
    /**写入字段 */
    public static $writefield = [
        'menu_name' => "菜单名称",
        'menu_to' => "菜单跳转",
        'menu_father_guid' => "菜单父级Guid",
    ];
    /**开启软删除 */
    public static $OpenSoftDelete = true;
    /**软删除字段 */
    public static $SoftDeleteField = "menu_delete_time";
    /**开启其余字段写入 */
    public static $OpenOtherWriteField = true;
    /**其余字段写入 */
    public static $OtherWriteField = [
        'create' => "menu_create_time",
        'update' => "menu_update_time",
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
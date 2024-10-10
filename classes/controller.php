<?php 
namespace block_users_aplus;

class controller extends abstract_controller
{
    private static $actions = [];

    public static function actions(){
        return self::$actions;
    }

    public static function add_action(string $action_name, string $action_class){
        self::$actions[$action_name] = $action_class;
        return true;
    }
    
}

controller::add_action('get_users_list', '\block_users_aplus\actions\action_get_users_list');
controller::add_action('get_user_info', '\block_users_aplus\actions\action_get_user_info');
controller::add_action('add_user_grade', '\block_users_aplus\actions\action_add_user_grade');
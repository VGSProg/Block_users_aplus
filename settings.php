<?php
/**
 * Users_apluss block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */

defined('MOODLE_INTERNAL') || die();

use tool_brickfield\local\tool\tool as base_tool;

if ($ADMIN->fulltree) {

    $setting = new admin_setting_configcheckbox('block_users_aplus_load_demo_users',
            get_string('admin_setting_demo_users', 'block_users_aplus'),
            get_string('admin_setting_demo_users_desc', 'block_users_aplus'), 0);
    $setting->set_updatedcallback(function(){
        global $CFG;

        if(isset($CFG->block_users_aplus_load_demo_users)){
            require_once($CFG->dirroot.'/blocks/users_aplus/demo_users.php');
            
            if($CFG->block_users_aplus_load_demo_users == true){
                demo_users_create();
            }else{
                demo_users_delete();
            }
        }  
    });
    $settings->add($setting);

}
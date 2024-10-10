<?php

/**
 * File description.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */

defined('MOODLE_INTERNAL') || die();

$functions = array(

    'block_users_aplus_users_list' => array(
        'classpath' => 'block/users_aplus/classes/external.php',
        'classname'   => 'block_users_aplus_external',
        'methodname'  => 'get_users_list',
        'description' => '',
        'type'        => 'read',
        'ajax'        => true,
        'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),

    'block_users_aplus_user_info' => array(
        'classpath' => 'block/users_aplus/classes/external.php',
        'classname'   => 'block_users_aplus_external',
        'methodname'  => 'get_user_info',
        'description' => '',
        'type'        => 'read',
        'ajax'        => true,
        'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),

    'block_users_aplus_user_add_grade' => array(
        'classpath' => 'block/users_aplus/classes/external.php',
        'classname'   => 'block_users_aplus_external',
        'methodname'  => 'user_add_grade',
        'description' => '',
        'type'        => 'write',
        'ajax'        => true,
        'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),
);


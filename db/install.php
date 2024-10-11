<?php

/**
 * Users_apluss installation.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license 
 */

defined('MOODLE_INTERNAL') || die();

 /**
  * Add the Users_apluss block to the dashboard for all users by default
  * when it is installed.
  */
function xmldb_block_users_aplus_install() {
    global $DB;

    $count_users = $DB->count_records('user');
    if($count_users < 5){

    }
}

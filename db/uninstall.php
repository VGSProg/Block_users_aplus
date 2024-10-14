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
 * Custom uninstallation procedure.
 */
function xmldb_block_users_aplus_uninstall() {
    global $CFG;

    require_once($CFG->dirroot.'/blocks/users_aplus/demo_users.php');
    demo_users_delete();

    return true;
}
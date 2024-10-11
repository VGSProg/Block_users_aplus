<?php
/**
 * Users aplus block external API
 *
 * @package    block_users_aplus
 * @category   external
 * @copyright  2024
 * @license    
 */

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->dirroot . '/course/externallib.php');

use core_course\external\course_summary_exporter;
use core_external\external_function_parameters;
use core_external\external_multiple_structure;
use core_external\external_single_structure;
use core_external\external_value;
use block_users_aplus\model;
use block_users_aplus\controller;

/**
 * Users aplus block external functions.
 *
 * @copyright  2024
 * @license    
 */
class block_users_aplus_external extends core_course_external {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     * @since Moodle 3.6
     */
    public static function get_users_list_parameters() {
        return new external_function_parameters([
            'limit' => new external_value(PARAM_INT, 'limit', VALUE_DEFAULT, 0),
            'offset' => new external_value(PARAM_INT, 'offset', VALUE_DEFAULT, 0),
        ]);
    }

    /**
     * Get users list.
     *
     * @return  array list users
     */
    public static function get_users_list($limit, $offset) {
        global $USER, $PAGE;

        $params = self::validate_parameters(self::get_users_list_parameters(), [
            'limit' => $limit,
            'offset' => $offset,
        ]);

        return controller::getInstance('get_users_list')->execute([
            'limit' => $limit,
            'offset' => $offset,
        ]);
    }

    /**
     * Returns description of method result value
     *
     * @return \core_external\external_description
     * @since Moodle 3.6
     */
    public static function get_users_list_returns() {
        return new external_single_structure([
            'users' => new external_multiple_structure(
                new external_single_structure([
                    'id' => new external_value(PARAM_INT, 'id of user'),
                    'icon' => new external_value(PARAM_TEXT, ''),
                    'icon_txt' => new external_value(PARAM_TEXT, ''),
                    'name' => new external_value(PARAM_RAW, ''),
                    'grade' => new external_value(PARAM_INT, ''),
                ])
            )
        ]);
    }





    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     * @since Moodle 3.6
     */
    public static function get_user_info_parameters() {
        return new external_function_parameters([
            'user_id' => new external_value(PARAM_INT, 'user_id', VALUE_DEFAULT, 0),
        ]);
    }

    /**
     * Get user information.
     *
     * @return  array list users
     */
    public static function get_user_info($user_id) {
        global $USER, $PAGE;

        $params = self::validate_parameters(self::get_user_info_parameters(), [
            'user_id' => $user_id,
        ]);

        return controller::getInstance('get_user_info')->execute(['user_id' => $user_id]);
    }

    /**
     * Returns description of method result value
     *
     * @return \core_external\external_description
     * @since Moodle 3.6
     */
    public static function get_user_info_returns() {
        return new external_single_structure([
            'user' => new external_single_structure([
                'id' => new external_value(PARAM_INT, ''),
                'icon' => new external_value(PARAM_RAW, ''),
                'icon_txt' => new external_value(PARAM_TEXT, ''),
                'name' => new external_value(PARAM_TEXT, ''),
                'url_profile' => new external_value(PARAM_TEXT, ''),
                'no_list_txt' => new external_value(PARAM_TEXT, ''),
                'grades' => new external_value(PARAM_BOOL, ''),
                'grades_items' => new external_multiple_structure(new external_single_structure([
                    'date' => new external_value(PARAM_TEXT, ''),
                    'grade' => new external_value(PARAM_INT, ''),
                ]))
            ])
        ]);
    }





    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     * @since Moodle 3.6
     */
    public static function user_add_grade_parameters() {
        return new external_function_parameters([
            'user_id' => new external_value(PARAM_INT, 'user_id', VALUE_DEFAULT, 0),
            'grade' => new external_value(PARAM_INT, 'grade', VALUE_DEFAULT, 0),
        ]);
    }

    /**
     * Rate user.
     *
     * @return  array list users
     */
    public static function user_add_grade($user_id, $grade) {
        global $USER, $PAGE;

        $params = self::validate_parameters(self::user_add_grade_parameters(), [
            'user_id' => $user_id,
            'grade' => $grade,
        ]);

        return controller::getInstance('add_user_grade')->execute([
            'user_id' => $user_id,
            'grade' => $grade,
        ]);
    }

    /**
     * Returns description of method result value
     *
     * @return \core_external\external_description
     * @since Moodle 3.6
     */
    public static function user_add_grade_returns() {
        return new external_single_structure([
            'error' => new external_value(PARAM_BOOL, '')
        ]);
    }
}

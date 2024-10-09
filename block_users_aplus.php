<?php

/**
 * Users_apluss block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */

defined('MOODLE_INTERNAL') || die();

class block_users_aplus extends block_base {

    /**
     * Sets the block title
     *
     * @return void
     *
     * @throws coding_exception
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_users_aplus');
    }

    /**
     * Defines where the block can be added
     *
     * @return array
     */
    public function applicable_formats() {
        return array('all' => true);
    }

    /**
     * Creates the blocks main content
     *
     * @return stdClass|stdObject
     *
     * @throws coding_exception
     * @throws dml_exception
     */
    public function get_content() {

        if ($this->content !== NULL) {
            return $this->content;
        }

        $demo_data = ['users' => [
            array('id'=>0, 'icon'=>false, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>'10'),
            array('id'=>1, 'icon'=>false, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>'10'),
            array('id'=>2, 'icon'=>false, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>'10'),
            array('id'=>3, 'icon'=>'#', 'icon_txt'=>false, 'name'=>'Dddddddd Fffffffff', 'grade'=>'10'),
            ]];

        $renderable = new \block_users_aplus\output\main($demo_data);
        $renderer = $this->page->get_renderer('block_users_aplus');

        $this->content = new stdClass;
        $this->content->text = $renderer->render($renderable);
        $this->content->footer = '';

        return $this->content;
    }

    /**
     * Header block show or hide
     * @return boolean
     */
    public function hide_header() {
        return false;
    }

    /**
     * Allow block instance configuration
     *
     * @return bool
     */
    public function has_config() {
        return false;
    }
}

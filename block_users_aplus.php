<?php

/**
 * Users_apluss block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */

defined('MOODLE_INTERNAL') || die();

use block_users_aplus\controller;

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

        $renderable = new \block_users_aplus\output\main(controller::getInstance('get_users_list')->execute(0));
        $renderer = $this->page->get_renderer('block_users_aplus');

        $this->content = new stdClass;
        $this->content->text = $renderer->render($renderable);
        $this->content->footer = '';

        return $this->content;
    }

    function get_required_javascript() {
        global $CFG;
        
        //$code = file_get_contents($CFG->dirroot.'/blocks/users_aplus/amd/src/base.js');
        //$this->page->requires->js_init_code($code , true);
        $this->page->requires->js_call_amd('block_users_aplus/base', 'init');
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
        return true;
    }
}

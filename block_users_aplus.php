<?php

/**
 * Users_apluss block.
 *
 * @package   block_users_aplus
 * @copyright 2017 
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

        $this->content = new stdClass;
        $this->content->text = 'text';
        $this->content->footer = 'footer';

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

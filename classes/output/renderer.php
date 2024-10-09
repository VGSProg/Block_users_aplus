<?php 
/**
 * Users_apluss block rendrer
 *
 * @package    block_users_aplus
 * @copyright  2024
 * @license    
 */
namespace block_users_aplus\output;
defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;
use renderable;

/**
 * block_users_aplus renderer
 *
 * @package    block_users_aplus
 * @copyright  2024
 * @license    
 */
class renderer extends plugin_renderer_base {

    /**
     * Return the main content for the block overview.
     *
     * @param main $main The main renderable
     * @return string HTML string
     */
    public function render_main(main $main) {
        return $this->render_from_template('block_users_aplus/users_list_server', $main->export_for_template($this));
    }
}

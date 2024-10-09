<?php
/**
 * Class containing data for users_apluss block.
 *
 * @package    block_users_aplus
 * @copyright  2024
 * @license    
 */
namespace block_users_aplus\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use templatable;

/**
 * Class containing data for users_apluss block.
 *
 * @package    block_users_aplus
 * @copyright  2024
 * @license    
 */
class main implements renderable {/*, templatable {*/

     /** @var string $sometext Some text to show how to pass data to a template. */
    private $data = null;

    public function __construct($data){
        $this->data = $data;
    }

    /**
      * Export this data so it can be used as the context for a mustache template.
      *
      * @return stdClass
      */
    public function export_for_template(/*renderer_base*/ $output){
        //$res = get_class($output);
        return $this->data;
    }
}

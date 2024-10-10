<?php
/**
 * Model data block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */
namespace block_users_aplus;

class model {
    final public static function get_users_list($args):array{
        $demo_data = ['users' => [
            array('id'=>0, 'icon'=>null, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>10),
            array('id'=>1, 'icon'=>null, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>10),
            array('id'=>2, 'icon'=>null, 'icon_txt'=>'DF', 'name'=>'Dddddddd Fffffffff', 'grade'=>10),
            array('id'=>3, 'icon'=>'#', 'icon_txt'=>null, 'name'=>'Dddddddd Fffffffff', 'grade'=>10),
            ]];
        return $demo_data;
    }

    final public static function get_user_info($args):array{
        $demo_data = ['user' => [
            'id'=>0,
            'icon' => null,
            'icon_txt' => 'DF', 
            'name' => 'Dffffff ARRRRrrrr',
            'url_profile' => '#',
            'grades' => [
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
                ['date'=>'10.10.2020', 'grade' => 10],
            ],
        ]];
        return $demo_data;
    }

    final public static function add_user_grade($args):array{
        //$user, $grade
        $demo_data = ['error'=>false];
        return $demo_data;
    }
}
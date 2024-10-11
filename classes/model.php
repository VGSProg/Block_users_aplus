<?php
/**
 * Model data block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */
namespace block_users_aplus;

use core\output\user_picture;
use moodle_url;

class model {
    final public static function get_users_list($args):array{
        global $DB, $USER, $PAGE;
        
        $sql = 'SELECT u.id as id, u.picture as picture, u.firstname as firstname, u.lastname as lastname,  
                        u.firstnamephonetic as firstnamephonetic, u.lastnamephonetic as lastnamephonetic, 
                        u.middlename as middlename, u.alternatename as alternatename, 
                        u.imagealt as imagealt, u.email as email, 
                        (SELECT g.grade FROM {block_users_aplus_grades} g WHERE u.id = g.userid ORDER BY 
                        g.timecreated DESC LIMIT 1) as grade
                        FROM {user} u';
        $users = $DB->get_records_sql($sql);
        
        $data = ['users' =>[]];
        foreach ($users as $user){
            if((int)$user->id === (int)$USER->id){
                continue;
            }

            $icon = null;
            $icon_txt = null;
            if($user->picture == 0){
                $icon_txt = mb_substr($user->firstname,0,1,'UTF-8').''.mb_substr($user->lastname,0,1,'UTF-8');
            }else{
                $PAGE->set_context(\context_user::instance($user->id, MUST_EXIST));
                $userpicture = new user_picture($user);
                $userpicture->size = 0;
                $icon = $userpicture->get_url($PAGE)->out(false); 
            }

            array_push($data['users'], [
                'id'=> $user->id,
                'icon'=> $icon,
                'icon_txt'=> $icon_txt,
                'name'=> $user->firstname.' '.$user->lastname,
                'grade'=> $user->grade
            ]);
        }
        
        return $data;
    }

    final public static function get_user_info($args):array{
        global $DB, $CFG, $PAGE;

        $user_id = $args['user_id'];

        $user = $DB->get_record('user', ['id' => $user_id], 'id, firstname, lastname, picture, firstnamephonetic, lastnamephonetic, middlename, alternatename, imagealt, email');
        if($user === false){
            throw new \Exception('User not found.');
        }
        
        $icon = null;
        $icon_txt = null;
        if($user->picture == 0){
            $icon_txt = mb_substr($user->firstname,0,1,'UTF-8').''.mb_substr($user->lastname,0,1,'UTF-8');
        }else{
            $PAGE->set_context(\context_user::instance($user->id, MUST_EXIST));
            $userpicture = new user_picture($user);
            $userpicture->size = 1;
            $icon = $userpicture->get_url($PAGE)->out(false); 
        }
        $url_profile = (new moodle_url("$CFG->wwwroot/user/profile.php", array('id' => $user->id)))->out();

        $grades = $DB->get_records('block_users_aplus_grades', ['userid' => $user_id], 'timecreated DESC', 'id, grade, timecreated');
        
        $grades_data = [];
        $grades_exist = false;
        if(count($grades) > 0){
            $grades_exist = true;
            foreach ($grades as $grade){
                array_push($grades_data, ['date'=>userdate($grade->timecreated,'%d.%m.%Y'), 'grade' => $grade->grade]);
            }
        }

        $demo_data = ['user' => [
            'id'=>$user->id,
            'icon' => $icon,
            'icon_txt' => $icon_txt, 
            'name' => $user->firstname.' '.$user->lastname,
            'url_profile' => $url_profile,
            'no_list_txt' => get_string('user_info_grades_no_list', 'block_users_aplus'),
            'grades' => $grades_exist,
            'grades_items' => $grades_data,
        ]];
        return $demo_data;
    }

    final public static function add_user_grade($args):array{
        global $DB, $USER;

        $user_id = $args['user_id'];
        $grade = $args['grade'];
        
        $user = $DB->get_record('user', ['id' => $user_id], 'id');
        if((int)$user->id !== $user_id){
            throw new \Exception('User not found.');
        }

        if((int)$user_id === (int)$USER->id){
            //
        }
        
        $grade_db_data = (object) [
            'createtoruserid' => $USER->id,
            'userid' => $user_id,
            'grade' => $grade,
            'timecreated' => time()
        ];
        $DB->insert_record('block_users_aplus_grades', $grade_db_data);

        return ['error'=>false];
    }
}
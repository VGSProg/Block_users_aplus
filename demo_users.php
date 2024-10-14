<?php
/**
 * Users_apluss block.
 *
 * @package   block_users_aplus
 * @copyright 2024
 * @license   
 */

function demo_users_create(){
    global $CFG, $DB;

    $db_file = $CFG->dirroot.'/blocks/users_aplus/demo_users.jsondb';
    if(file_exists($db_file)){

        return;
    }

    //$db_users = json_decode(file_get_contents($db_file),true);
    //$user = $DB->get_record('user', ['id' => $user_id], 'id, username, firstname, lastname, email');   //

    $users = [];
    for($i=0; $i<16; $i++){
        $usernew = new stdClass();
        $usernew->course = 1;
        $usernew->username = 'login_'.$i;
        $usernew->auth = "manual";
        $usernew->suspended = "0";
        $usernew->newpassword = "11111111qQ!";
        $usernew->preference_auth_forcepasswordchange = "0";
        $usernew->firstname = "f_name_".$i;
        $usernew->lastname = "l_name_".$i;
        $usernew->email = "f_name_".$i."@test.ua";
        $usernew->maildisplay = "";
        $usernew->moodlenetprofile = "";
        $usernew->city = "";
        $usernew->country = "";
        $usernew->timezone = "99";
        $usernew->lang = "en";
        $usernew->description_editor = [
            "text" => "",
            "format" => "1"
        ];
        $usernew->mform_isexpanded_id_moodle_picture = 1;
        $usernew->imagefile = 955313343;
        $usernew->imagealt = "";
        $usernew->firstnamephonetic = "";
        $usernew->lastnamephonetic = "";
        $usernew->middlename = "";
        $usernew->alternatename = "";
        $usernew->interests = [];
        $usernew->idnumber = "";
        $usernew->institution = "";
        $usernew->department = "";
        $usernew->phone1 = "";
        $usernew->phone2 = "";
        $usernew->address = "";
        $usernew->submitbutton = "Создать пользователя";
        $usernew->timemodified = time();
        $usernew->descriptiontrust = 0;
        $usernew->description = "";
        $usernew->descriptionformat = "1";
        $usernew->mnethostid = "1";
        $usernew->confirmed = 1;
        $usernew->timecreated = time();
        $usernew->password = hash_internal_user_password($usernew->newpassword);

        $usernew->id = user_create_user($usernew, false, false);
        
        array_push($users, array(
            'id' => $usernew->id, 
            'username' => $usernew->username,
            'firstname' => $usernew->firstname,
            'lastname'=> $usernew->lastname,
            'email' => $usernew->email
        ));
    }
    file_put_contents($db_file,json_encode($users));
}

function demo_users_delete(){
    global $CFG, $DB;

    $db_file = $CFG->dirroot.'/blocks/users_aplus/demo_users.jsondb';
    if(!file_exists($db_file)){
        return;
    }

    $db_users = json_decode(file_get_contents($db_file),true);
    if($db_users === false || $db_users === null){
        throw new \Exception(json_last_error_msg());
    }

    for($i=0; $i<count($db_users); $i++){
        $user_id = $db_users[$i]['id'];
        //$user = $DB->get_record('user', ['id' => $user_id], 'id, username, firstname, lastname, email');
        $DB->delete_records('user', ['id' => $user_id]);
        $DB->delete_records('block_users_aplus_grades', ['userid' => $user_id]);
    }

    unlink($db_file);
}
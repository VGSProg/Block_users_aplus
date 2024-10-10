<?php
namespace block_users_aplus\actions;

use block_users_aplus\abstract_action;
use block_users_aplus\model;

final class action_get_user_info extends abstract_action
{
    public function execute($args)
    {
        return model::get_user_info($args);
    }
}

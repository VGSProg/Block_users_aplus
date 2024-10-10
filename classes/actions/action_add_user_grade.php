<?php
namespace block_users_aplus\actions;

use block_users_aplus\abstract_action;
use block_users_aplus\model;

final class action_add_user_grade extends abstract_action
{
    public function execute($args)
    {
        return model::add_user_grade($args);
    }
}

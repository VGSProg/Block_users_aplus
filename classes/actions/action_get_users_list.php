<?php
namespace block_users_aplus\actions;

use block_users_aplus\abstract_action;
use block_users_aplus\model;

final class action_get_users_list extends abstract_action
{
    public function execute($args)
    {
        return model::get_users_list($args);
    }
}

<?php
namespace block_users_aplus;

abstract class abstract_action
{
    abstract public function execute($args);

    public static function getInstance()
    {
        return new static();
    }
}

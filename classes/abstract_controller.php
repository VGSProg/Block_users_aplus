<?php
namespace block_users_aplus;

/**
 * Example:
 * class Controller extends AbstractController{}
 * Controller::getInstance($action)->execute();
 */
abstract class abstract_controller
{
    /**
     * @return array [
     *      'exampleActionName1' => \namespace\actionClass1,
     *      'exampleActionName2' => \namespace\actionClass2,
     *  ];
     */
    abstract public static function actions();

    /** @var abstract_action */
    protected $action;

    /**
     * @throws \Exception
     */
    public static function getInstance(string $action): abstract_controller
    {
        return new static($action);
    }

    /**
     * @throws \Exception
     */
    public function __construct(string $action)
    {
        $actions = static::actions();
        if (!isset($actions[$action])) {
            throw new \RuntimeException('Error: incorrect action.');
        }

        /** @var abstract_action $actionClass */
        $actionClass = $actions[$action];

        $this->action = $actionClass::getInstance();
    }

    /**
     * @throws \Exception
     */
    public function execute($args = null)
    {
        $this->validateAction();

        return $this->action->execute($args);
    }

    protected function validateAction()
    {
        if (!$this->action) {
            throw new \Exception('Action not set.');
        }

        if (!($this->action instanceof abstract_action)) {
            throw new \Exception('Action does not exist.');
        }
    }
}

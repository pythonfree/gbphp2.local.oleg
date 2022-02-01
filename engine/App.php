<?php


namespace app\engine;

use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UserRepository;
use app\traits\TSingleton;

/**
 * Class App
 * @package app\engine
 * @property Request $request
 * @property BasketRepository $basketRepository
 * @property UserRepository $userRepository
 * @property ProductRepository $productRepository
 * @property Db $db
 */
class App
{
    use TSingleton;

    public $config;
    private $components;
    private $controller;
    private $action;

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render());
            $controller->runAction($this->action);
        } else {
            echo 'Не верный контроллер';
        }

    }

    /**
     * $return static
     */
    public function call()
    {
        return static::getInstance();
    }

    //создание компонента при обращении, возвращает объект для хранилища
    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                //воспользуемся библиотекой ReflectionClass для создания класса
                //просто return new $class нельзя
                //т.к. не будут переданы параметры для конструктора
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
    }

}
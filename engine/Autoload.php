<?php


class Autoload
{
    private $path = [
        'model',
        'engine'
    ];

    public function loadClass($className)
    {
        foreach ($this->path as $path) {
            $fileName = __DIR__ . "/../{$path}/{$className}.php";
            $fileName = str_replace('/', '\\', $fileName);
            if (is_readable($fileName)) {
                var_dump($fileName);
                include $fileName;
                break;
            }
        }
    }
}
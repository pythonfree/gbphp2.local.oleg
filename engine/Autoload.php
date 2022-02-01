<?php

namespace app\engine;


class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace(['app', '\\'], [ROOT_DIR, DS],  $className) . '.php';
        if (is_readable($fileName)) {
            include $fileName;
        } else {
            throw new \Exception('Класс не найден.');
        }
    }
}
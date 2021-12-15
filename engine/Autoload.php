<?php


class Autoload
{
    public function loadClass($className)
    {

        $arPath = explode('\\', $className);
        $fileName = end($arPath) . '.php';

        $path = '';
        foreach ($arPath as $notVendor => $part) {
            if ($notVendor) {
                if (end($arPath) !== $part) {
                    $path .= '/' . $part;
                }
            }
        }
        $path = $_SERVER['DOCUMENT_ROOT'] . '/..' . $path;

        $fullName = $path . '/' . $fileName;
        $fullName = str_replace('\\', '/', $fullName);
        if (is_readable($fullName)) {
            include $fullName;

        }

    }
}
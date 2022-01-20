<?php


namespace app\engine;


use app\interfaces\IRenderer;

class Render implements IRenderer
{
    public function renderTemplate($template, $params = [])
    {
        ob_start();

        extract($params);

        $templatePath = TEMPLATE_DIR . $template . '.php';

        if (is_readable($templatePath)) {
            include $templatePath;
        }

        return ob_get_clean();
    }
}
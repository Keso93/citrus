<?php
namespace Controller;

use Database\Database;

abstract class AbstractController
{
    final public function __construct()
    {
    }

    protected function response($content)
    {
        echo $content;
    }

    protected function jsonResponse($content)
    {
        echo json_encode($content);
    }

    protected function loadTemplate($template)
    {
        return file_get_contents($this->templatePath($template));
    }

    protected function getConnection(){
        $database = new Database();
        return $database->getConnection();
    }

    protected function redirectToRoute($route)
    {
        header("Location: $route");
        die();
    }

    protected function render($template, array $params = [])
    {
        ob_start();
        include $this->templatePath($template);

        return ob_get_clean();
    }

    private function templatePath($template)
    {
        return sprintf(__DIR__.'/../../templates/%s', $template);
    }
}

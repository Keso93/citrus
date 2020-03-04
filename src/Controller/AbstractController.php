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
        return file_get_contents(sprintf(__DIR__.'/../../templates/%s', $template));
    }

    protected function getConnection(){
        $database = new Database();
        return $database->getConnection();
    }
}

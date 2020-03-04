<?php

namespace Controller;


class ErrorController extends AbstractController
{

    /**
     * Route
     */
    public function notFound()
    {
        $this->response($this->loadTemplate('error/404.html'));
    }
}

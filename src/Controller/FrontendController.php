<?php
namespace Controller;


class FrontendController extends AbstractController
{
    /**
     * Route
     */
    public function homepage()
    {
        $this->response($this->loadTemplate('index.html'));
    }

}

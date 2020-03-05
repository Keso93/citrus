<?php
namespace Controller;


class FrontendController extends AbstractController
{
    /**
     * Route
     */
    public function homepage()
    {
        $this->response($this->render('index.php', ['is_logged' => isset($_SESSION['id'])]));
    }
}

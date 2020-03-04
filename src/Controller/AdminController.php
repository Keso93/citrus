<?php


namespace Controller;

use Kernel\Request;
use PDO;
use Repository\AdminRepository;
use Repository\CommentRepository;

class AdminController extends AbstractController
{
    /**
     * Route
     */
    public function login()
    {
        if ($this->checkSession()){
            $host = Request::getSchemeAndHost();
            header("Location: $host/admin/dashboard");
            die();
        } else {
            $this->response($this->loadTemplate('admin/login.html'));
        }
    }

    /**
     * Route
     */
    public function jsonLogin()
    {
        $content = Request::postContent();

        $name = $content['name'];
        $password = $content['password'];
        $stmt = $this->getRepository()->loginAdmin($name, $password);

        session_start();
        if($stmt->rowCount() === 1){
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $adminId = $row['id'];
            $adminName = $row['name'];
            $_SESSION['id'] = $adminId;
            $_SESSION['name'] = $adminName;
            // create array
            $response = [
                "status" => true,
                "message" => "Successfully Login!",
                "id" => $row['id'],
                "name" => $row['name']
            ];
        }
        else {
            $response = [
                "status" => false,
                "message" => "Invalid Username or Password!",
            ];
        }
        $this->jsonResponse($response);
    }

    /**
     * Route
     */
    public function dashboard()
    {
        if ($this->checkSession()){
            $this->response($this->loadTemplate('admin/adminDashboard.html'));
        } else {
            $host = Request::getSchemeAndHost();
            header("Location: $host/admin/login");
            die();
        }
    }

    /**
     * Route
     */
    public function logout()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);

        $response = [
            'status' => true
        ];
        $this->jsonResponse($response);
    }

    /**
     * Route
     */
    public function approveComment()
    {
        $comments = Request::postContent();

        foreach ($comments as $comment){
            if($this->getCommentRepository()->editComment($comment['id'], $comment['approve'])){
                $response = [
                    "status" => true,
                    "message" => "Successfully changed!",
                ];
            }
            else{
                $response = [
                    "status" => false,
                    "message" => "Error!"
                ];
            }
        }
        $this->jsonResponse($response);
    }

    /**
     * Route
     */
    public function disapproveComment()
    {
        $comments = Request::postContent();

        foreach ($comments as $comment){
            if($this->getCommentRepository()->editComment($comment['id'], $comment['disapprove'])){
                $response = [
                    "status" => true,
                    "message" => "Successfully changed!",
                ];
            }
            else{
                $response = [
                    "status" => false,
                    "message" => "Error!"
                ];
            }
        }
        $this->jsonResponse($response);
    }


    private function getRepository()
    {
        return new AdminRepository($this->getConnection());
    }


    private function getCommentRepository()
    {
        return new CommentRepository($this->getConnection());
    }


    private function checkSession()
    {
        session_start();
        if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
            return true;
        } else {
            return false;
        }
    }
}
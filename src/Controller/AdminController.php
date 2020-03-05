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
            header("Location: /admin/dashboard");
            die();
        } else {
            $error = $_SESSION['wrong'];
            unset($_SESSION['wrong']);
            $this->response($this->render('admin/login.php', ['wrong' => $error]));
        }
    }

    /**
     * Route
     */
    public function jsonLogin()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $stmt = $this->getRepository()->loginAdmin($name, $password);

        if($stmt->rowCount() === 1){
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $adminId = $row['id'];
            $adminName = $row['name'];

            $_SESSION['id'] = $adminId;
            $_SESSION['name'] = $adminName;

            $this->redirectToRoute('/admin/dashboard');

        } else {
            $_SESSION['wrong'] = true;
            $this->redirectToRoute('/admin/login');

        }
    }

    /**
     * Route
     */
    public function dashboard()
    {
        if ($this->checkSession()){
            $this->response($this->loadTemplate('admin/adminDashboard.html'));
        } else {
            $this->redirectToRoute('/admin/login');
        }
    }

    /**
     * Route
     */
    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        $this->redirectToRoute('/');

    }

    /**
     * Route
     */
    public function approveComment()
    {
        $comments = Request::postContent();

        if (!is_array($comments) || count($comments) === 0){
            $this->jsonResponse(["status" => false, "message" => "No comments provided!"]);
            return;
        }

        $response = [];
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

        if (!is_array($comments) || count($comments) === 0){
            $this->jsonResponse(["status" => false, "message" => "No comments provided!"]);
            return;
        }

        $response = [];
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
        return isset($_SESSION['id']) && isset($_SESSION['name']);
    }
}
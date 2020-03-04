<?php


namespace Controller;

use Database\Database;
use Entity\Comment;
use Kernel\Request;
use Repository\CommentRepository;

class CommentController extends AbstractController
{
    /**
     * Route
     */
    public function showUnapprovedComments()
    {
        $stmt = $this->getRepository()->findUnapprovedComments();
        $this->jsonResponse($stmt->fetchAll());
    }

    /**
     * Route
     */
    public function showApprovedComments()
    {
        $stmt = $this->getRepository()->findApprovedComment();
        $this->jsonResponse($stmt->fetchAll());
    }

    /**
     * Route
     */
    public function addComment()
    {
        $content = Request::postContent();
        $comment = new Comment();
        $comment->setName($content['name'])->setEmail($content['email'])->setText($content['text'])->setDate($content['date'])->setApprove($content['approve']);

        if($this->getRepository()->save($comment)){
            $response= [
                "status" => true,
                "message" => "Successfully Saved!",
                "id" => $comment->getId(),
                "name" => $comment->getName(),
                "text" => $comment->getText()
            ];
        }
        else{
            $response = [
                "status" => false,
                "message" => "Comment not saved!"
            ];
        }
        $this->jsonResponse($response);
    }


    private function getRepository()
    {
        return new CommentRepository($this->getConnection());
    }
}
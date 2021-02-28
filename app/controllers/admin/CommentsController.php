<?php


namespace app\controllers\admin;


use app\models\Comment;

class CommentsController extends AppController
{
    public function indexAction()
    {
        $comments = new Comment();

        $arrComments = $comments->allComments();

        $this->setVars(['comments' => $arrComments]);
    }
}
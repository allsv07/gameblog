<?php


namespace app\controllers\admin;


use app\models\Comment;

class CommentsController extends AppController
{
    public function indexAction()
    {
        $comments = new Comment();

        $arrComments = $comments->allComments();
        $arrComments = editNewDateArray($arrComments);

        $countComments = $comments->countCommentsByAdmin();
        $this->setVars(['comments' => $arrComments, 'cComment' => $countComments]);
    }

    public function editAction()
    {
        $comments = new Comment();
        $id = $this->route['id'];
        $table_name = $comments->getTableNameFromComments($id);

        $comment = $comments->getComment($id, $table_name);

        /**
         * редактирование комментария
         */
        if (isset($_POST['btn_edit'])) {
            $comments->editComment($id, ['show_comment' => $_POST['show_comment']]);
            header('Location: /admin/comments');
            die();
        }

        $countComments = $comments->countCommentsByAdmin();
        $this->setVars(['comments' => $comment, 'cComment' => $countComments]);
    }

    public function dellAction()
    {
        $comments = new Comment();
        $id = $this->route['id'];

        $comments->dellComments($id);
        header('Location: /admin/comments');
        die();
    }
}
<?php

use Phalcon\Tag;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', null, 0);

        $paginator = new Phalcon\Paginator\Adapter\Model(
            array(
                "data" => Posts::find(array('order' => "created DESC")),
                "limit"=> $this->_limitPerPage,
                "page" => $currentPage
            )
        );

        // Get the paginated results
        $this->view->posts = $paginator->getPaginate();

    }

    public function postAction() {
        $slug = $this->dispatcher->getParam("slug");
        $this->view->post = Posts::findFirstBySlug($slug);
        $form = new CommentForm();
        $form->error = false;

        if($this->request->isPost()) {
            if(!$form->isValid($this->request->getPost())) {
               $form->error = true;
               $this->flash->error('Error ! Please check your information submitted !');
            } else {
                $comment = new Comments();
                $now = new Datetime('now');
                $comment->assign(array(
                    'mail' => $this->request->getPost('mail', 'striptags'),
                    'username' => $this->request->getPost('username', 'striptags'),
                    'content' => $this->request->getPost('content', 'striptags'),
                    'post_id' => $this->view->post->id,
                    'created' => $now->format('Y-m-d H:i:s')
                ));

                if(!$comment->save())
                    $this->flash->error('Error on save ! Please contact your system administrator !');
                else
                    Tag::resetInput();             
            }
        }
        $this->view->form = $form;
    }

}


<?php

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

        $this->view->form = new CommentForm();
    }

}


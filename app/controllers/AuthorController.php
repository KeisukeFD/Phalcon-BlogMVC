<?php

class AuthorController extends ControllerBase
{

    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', null, 0);
        $params = $this->router->getParams();

        $request = Users::findFirstById($params['id']);
        $postForUser = $request->posts;

        $paginator = new Phalcon\Paginator\Adapter\Model(
            array(
                "data" => $postForUser,
                "limit"=> $this->_limitPerPage,
                "page" => $currentPage
            )
        );

        // Get the paginated results
        $this->view->posts = $paginator->getPaginate();
    }


    public function loginAction() {
        include_once __DIR__ . '/../forms/UsersLoginForm.php';
        $this->view->form = new LoginForm();
    }
}


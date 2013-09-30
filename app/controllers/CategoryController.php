<?php

class CategoryController extends ControllerBase
{

    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', null, 0);
        $params = $this->router->getParams();

        $request = Categories::findFirstBySlug($params['slug']);
        $postInCategory = $request->posts;

        $paginator = new Phalcon\Paginator\Adapter\Model(
            array(
                "data" => $postInCategory,
                "limit"=> $this->_limitPerPage,
                "page" => $currentPage
            )
        );

        // Get the paginated results
        $this->view->posts = $paginator->getPaginate();
    }

}


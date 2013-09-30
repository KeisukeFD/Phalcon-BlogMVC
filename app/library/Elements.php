<?php

use Phalcon\Mvc\User\Component;

class Elements extends Component
{

    public function getCategories() {
        return Categories::find();
    }

    public function getLastPosts() {
        return Posts::find(array('limit' => 2, 'order' => "created"));
    }

}
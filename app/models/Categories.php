<?php


class Categories extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var string
     */
    public $slug;
     
    /**
     *
     * @var string
     */
    public $post_count;

    public function initialize() {
        $this->hasMany("id", "Posts", "category_id");
    }
     
}

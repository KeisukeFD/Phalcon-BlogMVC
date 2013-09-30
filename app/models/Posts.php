<?php


class Posts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var integer
     */
    public $category_id;
     
    /**
     *
     * @var integer
     */
    public $user_id;
     
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
    public $content;
     
    /**
     *
     * @var string
     */
    public $created;
     

    public function initialize() {
        $this->belongsTo("category_id", "Categories", "id");
        $this->belongsTo("user_id", "Users", "id");
        $this->hasMany("id", "Comments", "post_id");
    }
}

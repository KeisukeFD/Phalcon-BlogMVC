<?php


class Comments extends \Phalcon\Mvc\Model
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
    public $post_id;
     
    /**
     *
     * @var string
     */
    public $username;
     
    /**
     *
     * @var string
     */
    public $mail;
     
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
        $this->belongsTo("post_id", "Posts", "id");
    }

}

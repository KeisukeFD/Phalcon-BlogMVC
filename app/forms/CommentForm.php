<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Textarea,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Submit;


class CommentForm extends Form
{

    public function initialize()
    {
        // Username
        $this->add(new Text('username', array(
            'placeholder' => 'Your username'
            ))
        );

        // Email
        $this->add(new Text('mail', array(
            'placeholder' => 'Your email'
            ))
        );

        // Commentaire
        $this->add(new Textarea('content', array(
            'placeholder' => 'Your comment'
            ))
        );


        $this->add(new Submit('Submit my comment', array(
            'class' => 'btn btn-success'
        )));
    }

}
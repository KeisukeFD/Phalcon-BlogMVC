<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Textarea,
    Phalcon\Forms\Element\Email,
    Phalcon\Forms\Element\Submit,

    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email as EmailValidator;


class CommentForm extends Form
{

    public function initialize()
    {
        // Username
        $username = new Text('username', array(
            'placeholder' => 'Your username'
        ));

        $username->addValidator(new PresenceOf());
        $this->add($username);

        // Email
        $email = new Text('mail', array(
            'placeholder' => 'Your email'
        )); 

        $email->addValidator(new PresenceOf());
        $email->addValidator(new EmailValidator());

        $this->add($email);

        // Commentaire
        $comment = new Textarea('content', array(
            'placeholder' => 'Your comment'
        ));

        $comment->addValidator(new PresenceOf());

        $this->add($comment);

        $this->add(new Submit('Submit my comment', array(
            'class' => 'btn btn-success'
        )));
    }

}
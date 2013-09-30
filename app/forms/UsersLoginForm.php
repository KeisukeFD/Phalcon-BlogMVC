<?php

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Submit,
    Phalcon\Validation\Validator\PresenceOf;


class LoginForm extends Form
{

    public function initialize()
    {
        // Username
        $username = new Text('username', array(
            'placeholder' => 'Username'
        ));

        // $username->addValidators(array(
        //     new PresenceOf(array(
        //         'message' => 'The username is required'
        //     ))
        // ));

        $this->add($username);

        //Password
        $password = new Password('password', array(
            'placeholder' => 'Password'
        ));

        // $password->addValidator(array(
        //     new PresenceOf(array(
        //         'message' => 'The password is required'
        //     ))
        // ));

        $this->add($password);


        $this->add(new Submit('Sign In', array(
            'class' => 'btn btn-success'
        )));
    }

}
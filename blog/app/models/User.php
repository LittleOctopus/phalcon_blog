<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class User extends Model
{
    // public function validation()
    // {
    //     $this->validate(new EmailValidator(array(
    //         'field' => 'email'
    //     )));
    //     $this->validate(new UniquenessValidator(array(
    //         'field' => 'email',
    //         'message' => 'Sorry, The email was registered by another user'
    //     )));
    //     $this->validate(new UniquenessValidator(array(
    //         'field' => 'name',
    //         'message' => 'Sorry, That username is already taken'
    //     )));
    //     if ($this->validationHasFailed() == true) {
    //         return false;
    //     }
    // }
}

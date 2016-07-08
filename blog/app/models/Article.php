<?php
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Article extends Model
{
   public $id;
   public $title;
   public $content;
   public $username;
   public $time;
   public $pv;
}

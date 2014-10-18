<?php
namespace OP\Model;

class Me extends \simpleMySQL\Model
{
    public function __construct()
    {
        parent::init('me');
    }
}
<?php
namespace OP\Model;

class ValidationsResource extends \simpleMySQL\Model
{
    public function __construct()
    {
        parent::init('validation-resource');
    }
}
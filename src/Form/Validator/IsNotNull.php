<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 09/10/14
 * Time: 15:45
 */

namespace OP\Form\Validator;


class IsNotNull {


    public function __construct()
    {

    }
    public function isValid($value)
    {
        return $value != 0;
    }
} 
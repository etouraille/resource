<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 09/10/14
 * Time: 15:12
 */

namespace OP\Form\Validator;

use Respect\Validation\Validator as v;

class MustBeValidEmail {

    public function isValid($email)
    {
        if(is_array($email)) $email = $email[0];
        return v::email()->validate($email);
    }

}
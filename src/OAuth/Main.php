<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 17/10/14
 * Time: 19:26
 */

namespace OP\OAuth;


class Main {

    public function __construct()
    {

    }

    public function authenticate($email,$password)
    {
        $me = new \OP\Model\Me();
        $rowMe = $me->getRow(
            array(
                'email'=>$email,
                'pass'=>$this->encrypt($password))
        );
        if($rowMe)
        {
            $token = new \OP\OAuth\Token();
            return $token->getTokenValue($rowMe['id']);

        }
        else
        {
            return false;
        }
    }

    private function encrypt($pass)
    {
        return md5($pass);
    }

}
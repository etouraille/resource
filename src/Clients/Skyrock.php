<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 29/09/14
 * Time: 13:19
 */

namespace OP\Clients;

class Skyrock
{

    protected $client;
    protected $fistToken;

    public function __construct()
    {
        include_once __DIR__.'/../sky/SkyrockOAuth.php';

        $this->client = new \SkyrockOAuth('bc50ec1f4f0f9c5e','cscuul4cmwtkfadg');

    }

    public function getClient()
    {
        return $this->client;
    }

    public function isAuthenticate()
    {
        return isset($_SESSION['sky']);
    }

    public function authenticate($code){
        $_SESSION['sky'] = $code;


    }

    public function setAccessToken(){
        if (isset($_SESSION['sky'])) { // extract token from session and configure client
            $ret = $this->client->getAccessToken($_SESSION['sky']);
            unset($_SESSION['sky']);
            return true;
        }
        return false;
    }

    public function getAccessToken()
    {
        return isset($_SESSION['sky']);
    }

    public function createAuthUrl()
    {
        $token = $this->client->getRequestToken('http://blog.karaganda.pw/jca/sky');
        return $this->client->getAuthorizeURL($token);
    }
}
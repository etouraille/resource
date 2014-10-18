<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 29/09/14
 * Time: 13:19
 */

namespace OP\Clients;

class Google
{

    protected $client;

    public function __construct()
    {
        $scriptUri = "http://blog.karaganda.pw/jca/blogger";

        $client = new \Google_Client();
        $client->setAccessType('online'); // default: offline
        $client->setApplicationName('API Project'); //name of the application

        $client->setClientId('179660142032-soqhrihpldgeuckg6uej25uac6rks9ec.apps.googleusercontent.com'); //insert your client id
        $client->setClientSecret('7gMEy0fipy1UlHLL8EBnUIPy'); //insert your client secret
        $client->setRedirectUri($scriptUri); //redirects to same url

        $client->setDeveloperKey('AIzaSyBM-gdwM2EnlPnBygcbVkIzLd_Yq02V0x4'); // API key (at bottom of page)
        $client->setScopes(array('https://www.googleapis.com/auth/blogger')); //since we are going to use blogger services

        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function isAuthenticate()
    {
        return isset($_SESSION['token']);
    }

    public function refreshToken()
    {
        if(isset($_SESSION['token'])){
            $google_token= json_decode($_SESSION['token']);

            $this->client->refreshToken($google_token->refresh_token);

            $_SESSION['token']= $this->client->getAccessToken();
        }
    }

    public function authenticate($code){
        $this->client->authenticate($code);
        $_SESSION['token'] = $this->client->getAccessToken();

    }

    public function setAccessToken(){
        if (isset($_SESSION['token'])) { // extract token from session and configure client
            $token = $_SESSION['token'];
            $this->client->setAccessToken($token);
            return true;
        }
        return false;
    }

    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }

    public function createAuthUrl()
    {
        return $this->client->createAuthUrl();
    }
}
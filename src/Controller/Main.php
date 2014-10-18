<?php
namespace OP\Controller;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Main
{

    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function checkToken(Request $request, Application $app)
    {
        $tokenValue = $request->get('token');
        $token = new \OP\OAuth\Token();
        $idMe = $token->isValid($token);
        if($idMe){
            $app['idMe'] = $idMe;
        }
        else
        {
            return $app->json(array('success'=>false,'message'=>'identification problem'));
        }
    }

    public function login(Request $request, Application $app)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $oauth = new \OP\OAuth\Main();
        $token = $oauth->authenticate($email,$password);

        $return = array();
        if($token){
            $success = true;
            $return['token']= $token;
        }
        else
        {
            $success = false;
        }
        $return['success']= $success;
        return $app->json($return);
    }

    public function createAccount(Request $request, Application $app)
    {
        $email = $request->get('email');
        $pass1 = $request->get('pass1');
        $pass2 = $request->get('pass2');

        $meModel = new \OP\Model\Me();
        $messages= array();
        if(!v::email()->validate($email))
        {
            $messages[] = "Email non valide";
        }
        $rowMe = $meModel->getRow(array('email'=>$email));
        if($rowMe)
        {
            $messages[] = "Cet email existe déjà";
        }
        if(empty($pass1))
        {
            $messages[] = "Le mot de passe ne doit pas être vide";
        }
        if($pass1 != $pass2)
        {
            $messages[] = "Les mots de passe doivent êtres identiques";
        }
        $success = true;
        $return = array();
        if(count($messages)>0)
        {
            $success = false;
            $return['messages']= $messages;
        }
        else
        {
            $meModel->add(array('email'=>$email,'pass'=>$pass1));
        }
        $return['success']= $success;

        return $app->json($return);
    }

}
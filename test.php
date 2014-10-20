<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();

simpleMySQL\Model::setParams('localhost','root','b1otope','resource');

$curl->post('http://resource/login',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'password'=>'b1otope',
    ));

$json = json_decode($curl->response);
$token = $json->token;
var_dump($token);
$oauth = new \OP\OAuth\Token();
sleep(5);
var_dump($oauth->isValid($token));
var_dump($oauth->getValid());

$curl->post('http://resource/login',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'password'=>'b1otope',
    ));

$json = json_decode($curl->response);
$token = $json->token;
var_dump($token);

sleep(5);
$curl->post('http://resource/login',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'password'=>'b1otope',
    ));

$json = json_decode($curl->response);
$token = $json->token;
var_dump($token);

/*

$curl->post('http://resource/credential',
    array(
        'token'=>$token,

    ));

var_dump($curl->response);

$curl->post('http://resource/credential',
    array(
        'token'=>123,

    ));

var_dump($curl->response);
*/
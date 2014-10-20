<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();


$curl->post('http://resource/login',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'password'=>'b1otope',
    ));

$json = json_decode($curl->response);
$token = $json->token;

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
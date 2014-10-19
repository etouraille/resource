<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();

$curl->post('http://resource/create-account',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'pass1'=>'b1otope',
        'pass2'=>'b1otope',
    ));

var_dump($curl->response);

$curl->post('http://resource/login',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'password'=>'b1otope',
    ));

$json = json_decode($curl->response);
$token = $json->token;
var_dump($curl->response);

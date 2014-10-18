<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();

$curl->post('http://resource.objetspartages.org/create-account',
    array(
        'email'=>'edouard.touraille@gmail.com',
        'pass1'=>'b1otope',
        'pass2'=>'b1otope',
    ));

var_dump($curl->response);

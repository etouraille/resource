<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();

$lbc = new \OP\LBC\UrlGenerator();

echo $lbc->generateUrl();

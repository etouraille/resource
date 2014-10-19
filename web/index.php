<?php
use Symfony\Component\HttpFoundation\Request;
require __DIR__."/../vendor/autoload.php";
session_start();

$app = new Silex\Application();
$app['Controller'] = new OP\Controller\Resource($app);
$app['debug'] = true;


simpleMySQL\Model::setParams('localhost','root','b1otope','resource');

//identification process.
$app['redirectIfNotLogged'] = array('/credential');

$app->before(function(Request $request)use ($app){
    foreach($app['redirectIfNotLogged'] as $url)
    {
        if(false !== strpos($request->getRequestUri(),$url)){
            return $app['Controller']->checkToken($request,$app);
        }
    }
});

$app->post('/login', function(Request $request) use($app) {
    return $app['Controller']->login($request,$app);
});

$app->post('/create-account', function(Request $request) use($app){
    return $app['Controller']->createAccount($request,$app);
});

$app->post('/credential/create/resource-type', function(Request $request) use($app){
    return $app['Controller']->createResourceType($request,$app);
});

$app->post('/credential/get/resource-type', function(Request $request) use($app){
    return $app['Controller']->getResourceType($request,$app);
});

/* on associe une ressource a un lieu a a une addres*/

$app->post('/credential/create/resource', function(Request $request) use($app){
    return $app['Controller']->createResource($request,$app);
});

$app->post('/credential/confirm/resource', function(Request $request) use($app){
    return $app['Controller']->confirmResource($request,$app);
});

$app->post('/credential/infirm/resource', function(Request $request) use($app){
    return $app['Controller']->infirmResource($request,$app);
});


$app->post('/credential/take/resource', function(Request $request) use($app){
    return $app['Controller']->takeResource($request,$app);
});

$app->post('/credential/get/resource', function(Request $request) use($app){
    return $app['Controller']->getResource($request,$app);
});



$app->error(function (\Exception $e, $code) use ($app) {

    if($app['debug'])
    {
        return;
    }


    if($code == 404)
    {
        return new \Symfony\Component\HttpFoundation\Response('404');
    }
    else
    {
        return new \Symfony\Component\HttpFoundation\Response('500');
    }

});


$app->run();

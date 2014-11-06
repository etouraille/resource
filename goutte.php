<?php
require 'vendor/autoload.php';

use Goutte\Client;

simpleMySQL\Model::setParams('localhost','root','b1otope','lbc');
$client = new Client();
$fp = fopen('department.csv','r+');
$model = new \OP\LBC\Model\NearDepartment();

while($row = fgetcsv($fp)){

    $departmentName = $row[4];
    $number = $row[1];
    $url = $departmentName.'-'.$number.'.php';
    $crawler = $client->request('GET', 'http://www.france-departements.fr/'.$url);
    $client->getClient()->setDefaultOption('config/curl/'.CURLOPT_TIMEOUT, 20);
    $model->add(
        array('idDepartment'=>$number,'idNearDepartment'=>$number)
    );

$crawler->filter('.fiche-middle-right > ul > li')->each(function($node) use($model,$number){
    $dep = $node->text();
    $tab = explode('-',$dep);
    $dept = trim($tab[count($tab)-1]);
    $model->add(
        array('idDepartment'=>$number,'idNearDepartment'=>$dept)
    );

});
}

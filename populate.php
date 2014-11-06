<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 05/11/14
 * Time: 17:14
 */

include 'vendor/autoload.php';

\simpleMySQL\Model::setParams('localhost','root','b1otope','lbc');

$fp = fopen('near_region.csv','r+');

$model = new \OP\LBC\Model\NearRegion();
while($row = fgetcsv($fp))
{
    $idRegion = $row[0];
    $idNearRegion = $row[1];

        $model->add(array(
            'idRegion'=>$idRegion,
            'idNearRegion'=>$idNearRegion,
        ));
}
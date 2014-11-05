<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 05/11/14
 * Time: 17:14
 */

include 'vendor/autoload.php';

\simpleMySQL\Model::setParams('localhost','root','b1otope','lbc');

$fp = fopen('region.csv','r+');

$model = new \OP\LBC\Model\Region();
while($row = fgetcsv($fp))
{
    $id = $row[0];
    $name = $row[1];
    $value = strtolower($name);

        $model->add(array(
            'id'=>$id,
            'name'=>$name,
            'value'=>$value,
        ));

}
<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 13:05
 */

namespace OP\LBC\Model;


class NearDepartment extends \simpleMySQL\Model{

    public function __construct()
    {
        parent::init('near_department');
    }
}
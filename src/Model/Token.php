<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 17/10/14
 * Time: 19:47
 */

namespace OP\Model;


class Token extends \simpleMySQL\Model{

    public function __construct()
    {
        parent::init('token');
    }

    public function clean($idMe,$idToken)
    {
        $query = sprintf("DELETE FROM `{$this->table}` WHERE `id` != '%s' AND `idMe` = '%s' ",$idToken,$idMe);

    }

}
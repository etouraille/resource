<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 13:05
 */

namespace OP\LBC\Model;


class Department extends \simpleMySQL\Model{

    public function __construct()
    {
        parent::init('department');
    }

    public function getDepartmentsFromRegion($regionName)
    {

        // todo table departement avec les nom et les valeur des departements et idRegion.
        $query = sprintf(
       "SELECT `name`, `value`
        FROM `{$this->table}`
        JOIN `region`
        ON `region.id` = `department.idRegion`
        WHERE region.name = '%s' ",
            $this->e($regionName));
        return $this->getRowsFromQuery($query);
    }

} 
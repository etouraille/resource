<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 13:05
 */

namespace OP\LBC\Model;


class ZipCode extends \simpleMySQL\Model{

    public function __construct()
    {
        parent::init('zip_code');
    }

    public function getZipCodeFromRegion($regionValue,$like = null)
    {
        $query = sprintf("SELECT `name`, `value` FROM `zip_code`
        JOIN department on zip_code.idDepartment = department.id
        JOIN region on region.id = department.idRegion
        WHERE region.value = '%s'
        AND %s
        ORDER BY zip_code.`name` DESC ", $this->e($regionValue),$this->like($like));
        return $this->getRowFromQuery($query);
    }

    public function getZipCodeFromCountry($like = null)
    {
        $query = sprintf("SELECT `name` , `value` FROM `zip_code`
        %s
        ORDER BY `name` DESC",$this->like($like));
        return $this->getRowsFromQuery($query);
    }

    public function getZipCodeFromNearRegion($regionValue,$like = null){
        //todo near_region qui contient un idNearRegion, id de la region limitrophe , sur une idRegion, l'id source etant indiquée.
        $query = sprintf("SELECT `name`, `value` FROM `zip_code`
        JOIN `department` ON `zip_code`.`idDepartment` = department.id
        JOIN near_region ON near_region.idNearRegion = department.idRegion
        JOIN region ON near_region.idRegion = region.identity
        WHERE region.value = '%s'
        AND %s
        ORDER BY zip_code.`name` DESC ",$this->e($regionValue),$this->like($like));
        return $this->getRowsFromQuery($query);
    }

    public function getZipCodeFromDepartment($departmentValue,$like = null)
    {
        $query = sprintf("SELECT `name`, `value` FROM zip_code
        JOIN department ON department.id = zip_code.idDepartment
        WHERE department.value = '%s'
        AND %s
        ORDER BY zip_code.`name` DESC",$this->e($departmentValue),$this->like($like));
        return $this->getRowsFromQuery($query);
    }

    public function getZipCodeFromNearDepartment($departmentValue,$like = null)
    {
        $query = sprintf("SELECT `name`, `value` FROM zip_code
        JOIN near_department ON near_department.idNearDepartment = zip_code.idDepartment
        JOIN department.id = near_department.idDepartment
        WHERE department.value = '%s'
        AND %s
        ORDER BY `zip_code`.`name` DESC",$this->e($departmentValue),$this->like($like));
        return $this->getRowFromQuery($query);
    }

    public function like($value)
    {
        if(isset($value))
            return " `zip_code`.`name` LIKE '%".$this->e($value)."%' OR `zip_code`.`value` LIKE '%".$this->e($value)."%'";
        else
            return '';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 13:52
 */

namespace OP\LBC\Filters\Region\Department;


class Neighbour extends \OP\LBC\Filter{

    public function getName(){
        return "Region::Department::Neighbour";
    }

    public function getAvailableFilters()
    {
        return array('Region::Zipcode::Main');
    }

    public function getAvailableValues()
    {
        $departmentFilter = \OP\LBC\FilterFactory\Main::get('Region::Department::Main');
        $departmentValue = $departmentFilter->getValue();
        $modelDepartment = new \OP\LBC\Model\Department();
        $rowDepartment = $modelDepartment->getRow(array('value'=>$departmentValue));
        return array($rowDepartment['num']=>'Départements Voisins');
    }

    public function setValue($value=null)
    {
        $data=$availableValues = $this->getAvailableValues();
        $keys = array_keys($availableValues);
        $value = array_shift($keys);
        $this->value = $value;
    }

    public function after()
    {
        return "Region::Department::Main";
    }
} 
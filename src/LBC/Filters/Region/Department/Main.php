<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 11:22
 */

namespace OP\LBC\Filters\Region\Department;


class Main extends \OP\LBC\Filter implements \OP\LBC\Filters\FilterInterface{

    protected $value;
    protected $data = array();

    public function getAvailableValues()
    {
        $region = \OP\LBC\FilterFactory\Main::get('Region::Main');
        $regionName = $region->getValue();
        $departmentModel = new \OP\LBC\Model\Department();
        $rows = $departmentModel->getDepartmentsFromRegion($regionName);
        $return = array();
        foreach($rows as $row)
        {
            $return[$row['value']]=$row['name'];
        }
        return $return;
    }

    public function getAvailableFilters(){
        return array('Region::Departement::Neighbour');
    }

    public function after()
    {
        return 'Region::Main';
    }
}
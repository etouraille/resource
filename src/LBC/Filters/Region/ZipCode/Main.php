<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 14:34
 */

namespace OP\LBC\Filters\Region\ZipCode;


class Main extends \OP\LBC\Filter {

    public function getAvailableValues(){
        $previousFilterInstanceName = $this->getPreviousFilter();
        $previousFilterInstance = $this->factory($previousFilterInstanceName);
        $zipCodeModel = new \OP\LBC\Model\ZipCode();
        switch($previousFilterInstanceName)
        {
            case 'Region::Main';

                $regionValue = $previousFilterInstance->getValue();
                $rows = $zipCodeModel->getZipCodeFromRegion($regionValue);

                break;

            case 'Region::Country':
                $rows = $zipCodeModel->getZipCodeFromCountry();
                break;

            case 'Region::Neighbour':
                $regionValue = $this->factory(
                    $this->factory($previousFilterInstance)->getPreviousFilter()
                )->getValue();
                $rows = $zipCodeModel->getZipCodeFromNearRegion($regionValue);
                break;

            case 'Region::Department::Main':
                    $departmentValue = $previousFilterInstance->getValue();
                    $rows = $zipCodeModel->getZipCodeFromDepartment($departmentValue);
                break;

            case 'Region::Department::Neighbour':
                    $departmentMainInstanceName = $previousFilterInstance->getPreviousFilter();
                    $departmentMainInstance = $this->factory($departmentMainInstanceName);
                    $departmentName = $departmentMainInstance->getValue();
                    $rows = $zipCodeModel->getZipCodeFromNearDepartment($departmentName);
                break;

            default :
                throw new \Exception(sprintf('Invalid Previous filter class Name : %s',$previousFilterInstanceName));
                break;
        }
        $return = array();
        foreach($rows as $row)
        {
            $return[$row['value']] = $row['name'];
        }
        return $return;
    }

    public function getAvailableFilters()
    {
        return null;
    }

    public function after()
    {
        return false;
    }

}
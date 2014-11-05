<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 11:15
 */

namespace OP\LBC\Filters\Region;


class Neighbour extends \OP\LBC\Filter {


    protected $value = 'bonnes_affaires';

    public function getName(){
        return 'Region::Neightbour';
    }

    public function getAvailableValues()
    {
        return array('bonnes_affaires'=>'Regions voisines');
    }

    public function setValue($value)
    {
        return null;
    }

    public function getAvailableFilters()
    {
        return array('Region::Zipcode::Main');
    }

    public function after()
    {
        return 'Region::Main';
    }

} 
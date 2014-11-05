<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 10:33
 */

namespace OP\LBC\Filters\Region;


class Country extends \OP\LBC\Filter {

    protected $value = 'occasions';

    public function getName(){
        return 'Region::Country';
    }

    public function getAvailableValues(){
        return array('occasions'=>'Toute la France');
    }

    public function setValue($value= null){
        $this->value = 'occasions';
    }

    public function getAvailableFilters(){
        return array(
            'Region::Zipcode::Main'
        );
    }

    public function after(){
        return 'Region::Main';
    }
}


<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 10:33
 */

namespace OP\LBC\Filters\Region;


class Country extends \OP\LBC\Filter implements \OP\LBC\Filters\FilterInterface{

    public function getAvailableValues(){
        return array('occasions'=>'Toute la France');
    }

    public function setValue($value= null){
        $this->value = 'occasions';
    }

    public function getAvailableFilters(){
        return array(
            'Region::ZipCode::Main'
        );
    }

    public function after(){
        return 'Region::Main';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 18:41
 */

namespace OP\LBC\Filters\OfferDemand;


class Main extends \OP\LBC\Filter{

    public function getAvailableValues()
    {
        return array(
            'offres'=>'Offres',
            'demandes'=>'Demandes'
        );
    }

    public function getAvailableFilters(){
        return null;
    }

    public function after()
    {
        return 'Category::Main';
    }
}
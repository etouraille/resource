<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 09:58
 */

namespace OP\LBC\Filters\Region;


class Main extends \OP\LBC\Filter {

    protected $data;
    protected $value;

    public function getName()
    {
        return "Region::Main";
    }

    public function __construct()
    {
        $this->data = parse_ini_file(__DIR__.'/main.ini');
    }

    public function getAvailableValues()
    {
        return $this->data;
    }

    public function setValue($value)
    {
        if(array_key_exists($value,$this->data))
        {
            $this->value = $value;
        }
        else
        {
            throw new \Exception('value doesnt exist');
        }
    }

    public function getAvailableFilters()
    {
        return array(
            'Region::Country',
            'Region::Neighbour',
            'Region::Department::Main',
            'Region::Zipcode::Main'
        );
    }


    public function after()
    {
        return 'OfferDemand::Main';
    }
}
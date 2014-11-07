<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 09:50
 */

namespace OP\LBC\Filters;




class Root extends \OP\LBC\Filter{

    protected $value = 'wwww.leboncoin.fr';

    public function getName()
    {
        return 'Root';
    }

    public function getAvailableFilters()
    {
        return array();
    }

    public function getAvailableValues()
    {
        return array();
    }

    public function after()
    {
        return null;
    }
}
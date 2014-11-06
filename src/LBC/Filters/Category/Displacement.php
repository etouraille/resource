<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Displacement extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Displacement';
    }

    public function getAvailableValues()
    {
        return array(); // todo implement
    }

    public function getAvailableFilters()
    {
        return array();
    }

    public function after()
    {
        return "Category::Main";
    }
}
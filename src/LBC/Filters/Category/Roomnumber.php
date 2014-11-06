<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Rommnumber extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Roomnumber';
    }

    public function getAvailableValues()
    {
        return array();
    }

    public function getAvailableFilters()
    {
        return array(
            "Category::Roomnumber::Min",
            "Category::Roomnumber::Max"
        );
    }

    public function after()
    {
        return "Category::Main";
    }
}
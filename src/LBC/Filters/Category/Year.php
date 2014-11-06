<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Year extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Year';
    }

    public function getAvailableValues()
    {
        return 'Année';
    }

    public function getAvailableFilters()
    {
        return array(
            'Category::Year::Min',
            'Category::Year::Max'
        );
    }

    public function after()
    {
        return "Category::Main";
    }
}
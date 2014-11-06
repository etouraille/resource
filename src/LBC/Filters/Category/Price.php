<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Price extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Price';
    }

    public function getAvailableValues()
    {
        return 'Prix';
    }

    public function getAvailableFilters()
    {
        return array(
            'Category::Price::Min',
            'Category::Price::Max'
        );
    }

    public function after()
    {
        return "Category::Main";
    }
}
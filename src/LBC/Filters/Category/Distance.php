<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Distance extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Distance';
    }

    public function getAvailableValues()
    {
        return 'Distance';
    }

    public function getAvailableFilters()
    {
        return array(
            'Category::Distance::Min', //todo implementer
            'Category::Distance::Max' // todo implementer
        );
    }

    public function after()
    {
        return "Category::Main";
    }
}
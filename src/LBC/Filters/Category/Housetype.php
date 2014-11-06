<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Housetype extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Housetype';
    }

    public function getAvailableValues()
    {
        return array(); // todo implement
    }

    //todo implement the solution to have
    // todo write story about ctr s and new generation, and the use of word as weapon , and those who believe in it, next generations
    public function getAvailableFilters()
    {
        return array(
            "Category::Housetype::Maison", //etc todo implement so as we could generate select automatically
            "Category::Housetype::Appartement" //etc todo implement the solution to have get data generated
            //etc ..
        );
    }

    public function after()
    {
        return "Category::Main";
    }
}
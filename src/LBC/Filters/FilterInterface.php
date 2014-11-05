<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 10:35
 */

namespace OP\LBC\Filters;


interface FilterInterface {

    public function getAvailableValues();

    public function setValue($value);

    public function getAvailableFilters();

    public function addFilter($filter);

    public function after();

    public function getName();

} 
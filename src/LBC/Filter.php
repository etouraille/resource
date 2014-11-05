<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 13:37
 */

namespace OP\LBC;


abstract class  Filter implements \OP\LBC\Filters\FilterInterface{

    protected $value;
    protected $filters = array();
    protected $values = array();
    protected $previousFilter = null;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $availableValue = $this->getAvailableValues();
        if(!array_key_exists($value,$availableValue))
        {
            throw new \Exception(sprint('Unavailable Value %s',$value));
        }
        $this->value = $value;
    }

    public function addFilter($filterName)
    {
        $filter = $this->factory($filterName);
        $filter->setPreviousFilter($this->getName());
        $this->filters[] = $filter;
    }

    public function addValue($value)
    {
        $this->values[] = $value;
    }

    public function setPreviousFilter($filter)
    {
        $this->previousFilter  = $filter;
    }

    public function getPreviousFilter()
    {
        return $this->previousFilter;
    }

    public function factory($class)
    {
        return \OP\LBC\FilterFactory\Main::get($class);
    }
} 
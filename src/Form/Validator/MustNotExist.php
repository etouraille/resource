<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 09/10/14
 * Time: 15:45
 */

namespace OP\Form\Validator;


class MustNotExist {

    protected $model;
    protected $field;

    public function __construct($model,$field)
    {
        $this->model = $model;
        $this->field = $field;
    }
    public function isValid($value)
    {
        if(is_array($value)) $value = $value[0];
        $row = $this->model->getRow(array($this->field=>$value));
        return !$row;
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 07/10/14
 * Time: 17:45
 */

namespace OP\Form\Validator;


use Symfony\Component\HttpFoundation\Request;

class Main {

    protected $condition;
    protected $var;
    protected $values = array();
    protected $camelcase = null;
    protected $rules;
    protected $isValid = array();
    protected $validators = array();

    public function __construct($codedData,$lang)
    {
        // et en valeur, la valeur de la variable
        $this->lang = $lang;
        $this->camelcase = new \OP\CamelCase\Main();
        foreach($codedData as $fieldAndRule)
        {
            $this->setFieldAndRule($fieldAndRule);

        }

    }

    protected function setFieldAndRule($fieldAndRule)
    {
        $data = $this->getRuleAndVar($fieldAndRule);
        $this->rules[$data['field']][] = $data['rule'];
        return $data['rule'];
    }

    public function validate(Request $request)
    {
        $isValid = true;
        foreach($this->rules as $field => $arrayRules)
        {
            $value = $request->get($field);
            $this->values[$field]= $value;
            foreach($arrayRules as $rule){
                if($this->$rule($value))
                {
                    if(!isset($this->isValid[$field])){
                        $this->isValid[$field] = true;
                    }
                }
                else
                {

                    $this->isValid[$field] = false;
                    $isValid = false;
                }
            }
        }
        return $isValid;
    }

    public function getData()
    {
        return $this->values;
    }

    public function getMessage($field)
    {
        $return = '';
        foreach($this->rules[$field]as $rule){
            if(!$this->$rule($this->values[$field])){

                $return .=  $this->lang[$field.ucfirst($rule)];
            }
        }
        return $return;
    }

    public function isValid($field)
    {
        return $this->isValid[$field];
    }


    public function getValue($field)
    {
        return $this->values[$field];
    }

    protected function getRuleAndVar($condition){
        $explodeCamel = $this->camelcase->getWords($condition);

        foreach($explodeCamel as $index=>$word)
        {
            if($index == 0)
            {
                $field = strtolower($word);
            }elseif($index == 1)
            {
                $rule = strtolower($word);
            }else
            {
                $rule .= ucfirst($word);
            }
        }
        return array('rule'=>$rule,'field'=>$field);
    }

    protected function mustNotBeEmpty($data)
    {
        return $data != '';
    }

    public function addRule($fieldAndRule,$validator)
    {
        $rule = $this->setFieldAndRule($fieldAndRule);
        $this->validators[$rule] = $validator;
    }

    public function __call($method,$args)
    {
        if(isset($this->validators[lcfirst($method)]))
        {
            return $this->validators[lcfirst($method)]->isValid($args);
        }
    }
}
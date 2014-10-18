<?php
namespace OP\User;

class Main
{
    protected $id;
    protected $data;
    protected $field;
    protected $model;

    public function __construct($field='me',$model)
    {
        $this->field = $field;
        $this->id = isset($_SESSION[$this->field])?$_SESSION[$this->field]:null;
        $this->setModel($model);
        $this->initData();
    }

    protected function initData()
    {
        $me = $this->getModel();
        $this->data = $me->getRow(array('id'=>$this->id));
    }

    public function setModel($model){
        $this->model = $model;
    }

    protected function getModel()
    {
        return $this->model;
    }

    public function isLogged()
    {
        return isset($this->id);
    }

    public function getField($field)
    {
        return isset($this->data[$field])?$this->data[$field]:false;
    }

    public function getPseudo()
    {
        return $this->getField('firstName').' '.$this->getField('lastName');
    }

    public function unlog()
    {
        unset($_SESSION[$this->field]);
        $this->id = null;
    }

    public function authenticate($login,$pass)
    {
        $me = $this->getModel();
        $row = $me->getRow(
            array(
                'email'=>$login,
                'pass'=>md5($pass)
            )
        );
        if($row)
        {
            $this->id =$row['id'];
            $_SESSION[$this->field] = $this->id;
            $this->data = $row;
            return true;
        }
        else
        {
            return false;
        }
    }
}
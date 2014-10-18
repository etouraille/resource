<?php
namespace OP\User;

class Admin extends Main
{

    public function __construct()
    {
        parent::__construct('admin');
    }

    protected function initData()
    {
        $data = parse_ini_file(__DIR__.'/../../data/password_admin.ini');
        $this->data = $this->parseData($data);
    }

    protected function parseData($data)
    {
        $return = array();
        foreach($data as $key=>$value)
        {
            $code = '0';
            if(preg_match('#(.)+\/#',$key,$result))
            {
                $code = $result[1];
                $tab = explode('/',$key);
                $key = $tab[1];
            }
            $return[$key]= array('email'=>$key,'pass'=>$value,'status'=>$code);
        }
        return $return;
    }

    public function getPseudo()
    {
        return $this->id;
    }

    public function authenticate($email,$pass)
    {

        if($this->data[$email]['pass'] ==  $pass)
        {
            $_SESSION['admin']= $email;
            $this->id = $email;
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if(isset($this->id))
        {
            return ($this->data[$this->id]['status'] == 'a');
        }
        return 0;
    }

    public function getAllUsers()
    {
        return $this->data;
    }

}
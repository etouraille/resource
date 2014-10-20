<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 17/10/14
 * Time: 19:44
 */

namespace OP\OAuth;


class Token {

    protected $duration;
    protected $tokenModel;

    public function __construct($duration=31449600)
    {
        $this->duration = $duration;
        $this->tokenModel = new \OP\Model\Token();

    }

    protected function create($idMe)
    {
        $this->tokenModel->add(array(
            'idMe'=>$idMe,
            'value'=>$tokenValue = strtolower(md5(time().$idMe)),
            'duration'=>$this->duration,
            )
        );
        return $tokenValue;
    }

    public function isValid($value)
    {
        $rowToken = $this->tokenModel->getRow(array('value'=>$value));
        if($rowToken){
            $duration = $rowToken['duration'];
            if($duration == 0){
                return $rowToken['idMe'];
            }
            else
            {
                $creation = $rowToken['creation'];
                $time = time();
                $valid =  (strtotime($creation)+$duration) > $time;
                if($valid)
                {
                    return $rowToken['idMe'];
                }
                else
                {
                    return false;
                }
            }
        }
        else
        {
            return false;
        }
    }

    
    public function getTokenValue($idMe)
    {
        $rowsToken = $this->tokenModel->getRows(array('idMe'=>$idMe),array('creation'=>'DESC'));
        $idToken = false;
        $tokenValue = false;
        foreach($rowsToken as $rowToken)
        {
            if($this->isValid($rowToken['value']))
            {
                  $idToken = $rowToken['id'];
                  $tokenValue = $rowToken['value'];
                  break;
            }
        }
        if($idToken)
        {
            $this->tokenModel->clean($idMe,$idToken);
            return $tokenValue;
        }
        else
        {
            return $this->create($idMe);
        }
    }
}
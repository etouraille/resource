<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 29/09/14
 * Time: 10:55
 */

namespace OP\Data;


class Parse {

    protected $file;
    protected $data = array();

    public function __construct($file)
    {
        $this->file = $file;
        $this->init();
    }

    public function init()
    {
        $fp = fopen($this->file,'r+');
        while($row = fgetcsv($fp,1000))
        {
            $this->data[] = $row;
        }
        fclose($fp);
    }

    public function getData(){
        return $this->data;
    }

}
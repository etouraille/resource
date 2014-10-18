<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 15/09/14
 * Time: 17:15
 */
namespace OP\ModelFile;

class Main
{
    protected $file;
    protected $data;

    public function __construct($file)
    {
        $this->file = $file;
        $this->ini();
    }

    protected function ini()
    {
        $this->data = parse_ini_file($this->file);
    }

    public function add($key,$value){
        $this->data[$key]=$value;
    }

    public function update($key,$value)
    {
        if(isset($this->data[$key]))
        {
            $this->add($key,$value);
        }
    }

    public function __destruct()
    {
        $fp = fopen($this->file,'w+');
        $chaine = '';
        foreach($this->data as $key=>$value)
        {
            $chaine .= $key.'='.$value."\n";
        }
        fwrite($fp,$chaine);
        fclose($fp);
    }
}
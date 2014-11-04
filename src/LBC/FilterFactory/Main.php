<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 10:48
 */

namespace OP\LBC\FilterFactory;


class  Main implements \Iterator{

    protected static $classes = array();

    protected $position;


    public function __construct(){
        $this->position = 'Root';

    }

    public static function get($classIndex)
    {
        if(isset(self::$classes[$classIndex]))
        {
            return self::$classes[$classIndex];
        }
        $exploded = explode('::',$classIndex);
        $shortClassName = implode("\\",$exploded);
        $class =  "\\OP\\LBC\\Filters\\".$shortClassName;
        $instance =  new $class;
        self::$classes[$classIndex]= $instance;
        return $instance;
    }

    public function valid()
    {
        return isset(self::$classes[$this->position]);
    }
    public function rewind()
    {
        $this->postion = 'Root';
    }

    public function key(){
        return $this->position;
    }

    public function next()
    {
        foreach(self::$classes as $filterInstanceName => $filterInstance)
        {
            if($this->position == $filterInstance->after())
            {
                $this->position = $filterInstanceName;
                return;
            }
        }
        $this->position = false;
    }

    public function current(){
        return self::$classes[$this->position];
    }
}
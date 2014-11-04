<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 10:48
 */

namespace OP\LBC\FilterFactory;


class Main {

    protected static $classes = array();

    public function get($class)
    {
        if(isset(self::$classes[$class]))
        {
            return self::$classes[$class];
        }
        $exploded = explode('::',$class);
        $class = implode("\\",$exploded);
        $class =  "\\OP\\LBC\\Filters\\".$class;
        return new $class;
    }
}
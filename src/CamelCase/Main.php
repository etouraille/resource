<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 07/10/14
 * Time: 17:54
 */

namespace OP\CamelCase;


class Main {

    public function __construct()
    {

    }

    public function getWords($word)
    {
        preg_match_all('/((?:^|[A-Z])[a-z]+)/',$word,$matches);
        return $matches[1];
    }

} 
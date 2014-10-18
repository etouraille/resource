<?php
namespace OP\Model;

class ResourceType extends \simpleMySQL\Model
{
    protected static $data;

    public function __construct()
    {
        parent::init('resource-type');
    }

}
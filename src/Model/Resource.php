<?php
namespace OP\Model;

class Resource extends \simpleMySQL\Model
{
    public function __construct()
    {
        parent::init('resource');
    }

    public function getResource($lat,$lng,$distance)
    {
        $query = sprintf("SELECT *, `validation-resource`.`idMe`, `time` ,DISTANCE(lat,lng,%f,%f) as r FROM {$this->table}
        LEFT JOIN `validation-resource`
        ON `{$this->table}`.`id` = idResource
        WHERE valid = 1
        GROUP BY `{$this->table}`.`id`
        ORDER BY `time` DESC
        HAVING r <= %f ",$lat,$lng,$distance);

        return $this->getRowsFromQuery($query);
    }
}
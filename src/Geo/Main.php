<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 07/10/14
 * Time: 14:59
 */

namespace OP\Geo;


class Main {

    protected $address;
    protected $data = array();
    protected $error = false;
    protected $lat= false;
    protected $lng= false;

    public function __construct($address)
    {
        $this->address = $address;
        $this->init();
    }

    protected function init()
    {
        $url = sprintf('https://maps.googleapis.com/maps/api/geocode/json?address=%s',urlencode($this->address));
        $curl = new \Curl\Curl();
        $curl->get($url);
        if($curl->error)
        {
            $this->error = true;
        }else
        {
            $this->data = json_decode($curl->response);
        }
        if(isset($this->data->results[0])){
            $this->lat = $this->data->results[0]->geometry->location->lat;
            $this->lng = $this->data->results[0]->geometry->location->lng;
        }

    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }
}
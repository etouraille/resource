<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 09:44
 */

namespace OP\LBC;


class UrlGenerator {

    protected $regionFilter;
    protected $offerDemandFilter;
    protected $categoryFilter;
    protected $rootFilter;

    public function __construct($categoryValue='annonces',$offerDemandValue='offres',$regionValue='ile_de_france')
    {
        $this->regionFilter = $this->factory('Region::Main');
        $this->offerDemandFilter = $this->factory('OfferDemand::Main');
        $this->categoryFilter = $this->factory('Category::Main');
        $this->rootFilter = $this->factory('Root');

        $this->regionFilter->setValue($regionValue);
        $this->offerDemandFilter->setValue($offerDemandValue);
        $this->categoryFilter->setValue($categoryValue);

    }

    public function getRegionFilter(){
        return $this->regionFilter;
    }

    public function getOfferDemandFilter(){
        return $this->offerDemandFilter;
    }

    public function getCategoryFilter(){
        return $this->categoryFilter;
    }

    public function generateUrl()
    {
        $strands = array();
        $filterFactory = new \OP\LBC\FilterFactory\Main();
        foreach( $filterFactory as $className=>$filterInstance){
            $strands[] = $filterInstance->getValue();
        }
        return 'http://'.implode('/',$strands).'/';
    }

    protected function factory($class){
        return \OP\LBC\FilterFactory\Main::get($class);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 05/11/14
 * Time: 12:39
 */

namespace OP\LBC\Controller;


use Symfony\Component\HttpFoundation\Request;

class Main {

    // on n'affiche les enfant que si la valeur est définie
    // on affiche toujours les valeurs possibles
    public function expand(Request $request)
    {
        $json = json_decode($request->getContent(),true);
    }

    protected function parseChildren(&$children)
    {
        foreach($children as $index => $data)
        {
            $currentFilter = $this->filterFactory($data['filterName']);
            $values = $currentFilter->getAvailableValues();
            $formatedAvailableValues = array();
            foreach($values as $key => $value)
            {
                $formatedAvailableValues[] = array('value'=>$key, 'name'=> $value);
            }
            $children[$index]['values'] = $formatedAvailableValues;
            $currentFilter->setValue($data['value']);
            $availableFilters = $this->convertFilterNamesToJson($currentFilter->getAvailableFilters());
            $currentChildren = array();
            if($data['value'] != false && count($availableFilters)>0)
            {
                // le fait de definir une variable peut modifier les filtre disponibles
                if(isset($data['children']) && !$this->childrenAndAvailableFilterAreTheSame($data['children'],$availableFilters)){
                    // si le filtre disponible change de celui en place on le recréet, sinon, on ne change rien
                    // il se peut que la valeur aie changée, mais, les filtre sont toujours les meme, on garde donc
                    // les valeur, si on le recrée, on laisse les valeur a false, et on donne la possibilité au
                    // au passage de rang inférieur de mettre en place les valeur disponibles.
                    foreach($availableFilters as $filterName)
                    {
                        $currentChildren[]= array(
                            'filterName'=>$filterName,
                            'value'=>false,
                            'values'=>array(),
                            'children'=> array()
                        );
                    }
                }
                else
                {
                    $currentChildren = $data['children'];
                }
                $children[$index]['children'] = $currentChildren;
                $this->parseChildren($children[$index]['children']);
            }
        }
    }

    protected function childrenAndAvailableFilterAreTheSame($children,$availableFilters)
    {
        $childrenTab = array_keys($children);
        $diff1 = array_diff($childrenTab,$availableFilters);
        $diff2 = array_diff($availableFilters,$childrenTab);
        return (count($diff1) == 0 && count($diff2) == 0);

    }

    protected function filterFactory($instanceName){
        $camelCase = new \OP\CamelCase\Main();
        $words = $camelCase->getWords($instanceName);
        foreach($words as $key=>$word){
            $words[$key] = ucfirst($word);
        }
        $instanceName = implode('::',$words);
        return \OP\LBC\FilterFactory\Main::get($instanceName);
    }

    public function convertFilterNamesToJson($filterNames)
    {
        foreach($filterNames as $index => $filterName)
        {
            $filterNames[$index] = $this->convertFilterNameToJson($filterName);
        }
        return $filterNames;
    }

    protected function convertFilterNameToJson($filterName)
    {
        $tab = explode('::',$filterName);
        $jsonName = '';
        foreach($tab as $word)
        {
            $jsonName .= ucfirst($word);
        }
        return $jsonName;
    }

}
/*
Structure du json :
{
    CategoryMain:
    { value: 'voiture' , children :
                    [
                        { maxPrice ; { value : 10 , childs : [], values ; [], availableChildren: []}},
                        { minPrice : { value : 1, childs : [] }}
                    ],
          values : [], avalaibleChildren : []
        },
    RegionMain: { value: false, childs: []}, }
 *
 * */
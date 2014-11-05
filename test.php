<?php
include 'vendor/autoload.php';
$curl = new \Curl\Curl();

$lbc = new \OP\LBC\UrlGenerator();

echo $lbc->generateUrl();

/*

Structure du json :
{
    CategoryMain:
        { value: 'voiture' , childs :
                    [
                        { maxPrice ; { value : 10 , childs : []}},
                        { minPrice : { value : 1, childs : [] }}
                    ],
          values : []
        },
    RegionMain: { value: undefined', childs: []}, }
 *
 * */

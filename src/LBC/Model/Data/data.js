/*
 Structure du json :
 [
 { filterName : 'CategoryMain', value: 'voiture' , children :
 [
 { maxPrice ; { value : 10 , childs : [], values ; [], availableChildren: []}},
 { minPrice : { value : 1, childs : [] }}
 ],
 values : [], avalaibleChildren : []
 }]
 *
 */
{ filterName : 'CategoryMain' , children : {}}

category
    value : voiture : name : voiture
        prix :
            min :
                value : 0 : name : 'choisir un prix'
                value : 1 : name : '0'
                etc ....
            max :
                value : 0 : name : 'choisir un prix max'
                value : 1 , name :
        cylindrée :
            min :
                value  0 , name : 'Choisir une cylindré'
                value :1 , name : '1 cm2'


manière dont on stoque les données :

{ filterName : 'CategoryMain' , children: [
    { value: 'voiture', name: 'voiture', children : [
        categoryName : 'Prix' : children : []
    ]} ] }

{ filterName : 'CategoryMain', children : }


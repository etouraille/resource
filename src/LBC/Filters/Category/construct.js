[{ filterName : 'CategoryMain', after: 'Root', children : [
    { name : 'Toutes Catégorie', value : 'annonce'  },
    { name : 'Véhicule', value : '_vehicules_' },
    { name : 'Voiture', value : 'voitures', children : [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]},
        { filterName : 'Year', label : 'Année', children: [
            {filterName : 'Min', 'css' : '#rs', get: 'rs' ,label :'Entre' },
            {filterName : 'Max', css :'#re', get: 're', label : 'Et'}
        ]},
        { filterName : 'Distance', label: 'KM', children: [
            {filterName : 'Min', css : '#ms', get : 'ms', label: 'Entre'},
            {filterName : 'Max', css: '#me', get : 'me', label : 'Et'}
        ]},
        { filterName : 'Engine', label : false, css: '#fueld', get : 'fu'},
        { filterName : 'Gearbox', label : false, css : '#gearboxd', get : 'gb'}
    ]},
    { name : 'Motos' , value : 'motos', children: [

    ]}
] }]
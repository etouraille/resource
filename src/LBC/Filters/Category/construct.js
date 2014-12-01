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
        { filterName : 'Cylinder', label: 'Cylindrée', children: [
            {filterName : 'Min', css : '#cubic_capacity_ccs', get : 'ccs', label: 'Entre'},
            {filterName : 'Max', css: '#cubic_capacity_cce', get : 'cce', label : 'Et'}
        ]}
    ]},
    { name : 'Caravaning' , value : 'caravaning', children: [
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
    ]},
    { name : 'Utility' , value : 'Utilitaire', children: [
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
        { filterName : 'Distance', label: '', get: 'fu', css: '#fueld'}
    ]},
    { name : 'CarEquipment' , value : 'equipement_auto', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'MotorcycleEquipment' , value : 'equipement_moto', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'CaravaningEquipment' , value : 'equipement_caravaning', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'Boating' , value : 'nautisme', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'BoatingEquipment' , value : 'equipement_nautisme', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'RealEstate' , value : '_immobilier_', label: '--IMMOBILIER--', children: []},
    { name : 'RealEstateSales' , value : 'ventes_immobilieres',label : 'Ventes Immobilières', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]},
        { filterName : 'Area', label : 'Surface' ,children : [
            { filterName : 'Min', css : '#sqs', get : 'sqs' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#sqe', get : 'sqe', label : 'Et'}
        ]},
        { filterName : 'Room', label : 'Pièces' ,children : [
            { filterName : 'Min', css : '#room_ros', get : 'ros' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#room_roe', get : 'roe', label : 'Et'}
        ]},
        { filterName : 'Category', label : '', type : 'checkbox' ,children : [
            { filterName : 'House', css : '#ret_1', get : 'ret' ,label: 'Maison', value : '1'},
            { filterName : 'Apartment', css : '#ret_2', get : 'ret' ,label: 'Appartement', value : '2'},
            { filterName : 'Land', css : '#ret_3', get : 'ret' ,label: 'Terrain', value : '3'},
            { filterName : 'parking', css : '#ret_4', get : 'ret' ,label: 'Parking', value : '4'},
            { filterName : 'Other', css : '#ret_5', get : 'ret' ,label: 'Autre', value : '5'}//permet de connaitre la position sur la page et la valeur du get
        ]},
    ]},
    { name : 'Locations' , value : 'locations',label : 'Locations', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]},
        { filterName : 'Area', label : 'Surface' ,children : [
            { filterName : 'Min', css : '#sqs', get : 'sqs' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#sqe', get : 'sqe', label : 'Et'}
        ]},
        { filterName : 'Room', label : 'Pièces' ,children : [
            { filterName : 'Min', css : '#room_ros', get : 'ros' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#room_roe', get : 'roe', label : 'Et'}
        ]},
        { filterName : 'Category', label : '', type : 'checkbox' ,children : [
            { filterName : 'House', css : '#ret_1', get : 'ret' ,label: 'Maison', value : '1'},
            { filterName : 'Apartment', css : '#ret_2', get : 'ret' ,label: 'Appartement', value : '2'},
            { filterName : 'Land', css : '#ret_3', get : 'ret' ,label: 'Terrain', value : '3'},
            { filterName : 'parking', css : '#ret_4', get : 'ret' ,label: 'Parking', value : '4'},
            { filterName : 'Other', css : '#ret_5', get : 'ret' ,label: 'Autre', value : '5'}//permet de connaitre la position sur la page et la valeur du get
        ]}
    ]},
    { name : 'Colocations' , value : 'collocations',label : 'Collocations', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]}
    ]},
    { name : 'HolidayLocations' , value : 'locations_de_vacances',label : 'Locations de Vacance', children: [
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]},
        { filterName : 'Date', label : 'Date' , type: 'date' ,children : [
        ]},
        { filterName : 'People', label : 'Personne' ,children : [
            { filterName : 'Min', css : '#room_ros', get : 'ros' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#room_roe', get : 'roe', label : 'Et'}
        ]},
        { filterName : 'Room', label : 'chambres' ,children : [
            { filterName : 'House', css : '#bedrooms_bros', get : 'bros' ,label: 'Entre'},
            { filterName : 'Apartment', css : '#bedrooms_broe', get : 'broe' ,label: 'Et'},
        ]},
        { filterName : 'SwimmingPool', label : '' , css : '#swimmingpool_d' , get : 'swd' }
    ]},
    { name : 'OfficeShop' , value : 'bureaux_commerces',label : 'Bureau & commerce', children: [
        { filterName : 'Category', label : '', type : 'radio' ,children : [
            { filterName : 'All', get : 'st' ,label: 'Tous', value : 'a'},
            { filterName : 'Sale', get : 'st' ,label: 'Vente', value : 's'},
            { filterName : 'Location',  get : 'st' ,label: 'Location', value : 'u'} // important,pas pour le parcours, mais pour la génération du formulaire
        ]},
        { filterName : 'Price', label : 'Prix' ,children : [
            { filterName : 'Min', css : '#ps', get : 'ps' ,label: 'Entre'}, //permet de connaitre la position sur la page et la valeur du get
            { filterName : 'Max', css : '#pe', get : 'pe', label : 'Et'}
        ]},
    ]},
    { name : 'Multimedia' , value : '_multimedia',label : '--Multimédia--', children:[] },
    
}]
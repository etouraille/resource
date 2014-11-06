<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Main extends \OP\LBC\Filter{

    public function getName(){
        return 'Category::Main';
    }

    public function getAvailableValues()
    {
        return array(
            'annonces'=>'Toutes Categories',
            '_vehicules_'=>'--Vehicules--',
            'voitures'=>'Voitures',
            'motos'=>'Motos',
            'caravaning'=>'Caravaning',
            'utilitaires'=>'Utilitaires',
            'equipement_auto'=>'Equipement Auto',
            'equipement_moto'=>'Equipement Moto',
            'equipement_caravaning'=>'Equipement Caravaning',
            'nautisme'=>'Nautisme',
            'equipement_nautisme'=>'Equipement Nautisme',
            '_immobilier_'=>'Immobilier',
            'ventes_immobilieres'=>'Ventes Immobilières',
            'locations'=>'Locations',
            'colocations'=>'Collocations',
            'locations_de_vacances'=>'Locations de vacances',
            'bureaux_commerces'=>'Bureaux & Commerces',
            '_multimedia_'=>'Multimedia',
            'informatique'=>'Informatique',
            'consoles_jeux_video'=>'Consoles & Jeux Videos',
            'image_son'=>'Images & Son',
            'telephonie'=>'Téléphonie',
            '_maison_'=>'Maison',
            'ameublement'=>'Ameublement',
            'electromenager'=>'Electromenager',
            'arts_de_la_table'=>'Art de la Table',
            'decoration'=>'Décoration',
            'linge_de_maison'=>'Linge de Maison',
            'bricolage'=>'bricollage',
            'jardinage'=>'Jardinage',
            'vetements'=>'Vêtements',
            'chaussures'=>'Chaussures',
            'accessoires_bagagerie'=>'Accessoires & Bagagerie',
            'montres_bijoux'=>'Montres & Bijous',
            'equipement_bebe'=>'Equipement Bébé',
            'vetements_bebe'=>'Vêtements Bébé',
            '_loisirs_'=>'--Loisirs--',
            'dvd_films'=>'DVD / Films',
            'cd_musique'=>'CD / Musique',
            'livres'=>'Livres',
            'animaux'=>'Animaux',
            'velos'=>'Vélos',
            'sports_hobbies'=>'Sports & Hobbies',
            'instruments_de_musique'=>'Instruments de Musique',
            'collection'=>'Collection',
            'jeux_jouets'=>'Jeux & Jouets',
            'vins_gastronomie'=>'Vins & Gastronomie',
            '_materiel_professionnel_'=>'Materiel Professionnel',
            'materiel_agricole'=>'Materiel Agricole',
            'transport_manutention'=>'Transport Manutention',
            'btp_chantier_gros_oeuvre'=>'BTP - Chantier, Gros Oeuvre',
            'outillage_materiaux_2nd_oeuvre'=>'Outillage materiaux 2nd Oeuvre',
            'equipements_industriels'=>'Equipements Industriels',
            'restauration_hotellerie'=>'Restauration Hotellerie',
            'fournitures_de_bureau'=>'Fournitures de Bureau',
            'commerces_marches'=>'Commerces & Marchés',
            'materiel_medical'=>'Materiel Médical',
            '_emploi_services_'=>'Emplois & Services',
            'emploi'=>'Emploi',
            'services'=>'Services',
            'billetterie'=>'Billetterie',
            'evenements'=>'Evenements',
            'cours_particuliers'=>'Cours Particulier',
            'covoiturage'=>'Covoiturage',
            '_'=>'--',
            'autres'=>'Autres',

        );
    }

    public function getAvailableFilters()
    {
        $offerDemandInstance = $this->factory("OfferDemand::Main");
        $offerDemandValue = $offerDemandInstance->getValue();
        switch($offerDemandValue)
        {
            case 'offres' :

                $tab =  array(
                    'annonces'=>array(),
                    '_vehicules_'=>array(),
                    'voitures'=>array(
                          'Category::Price',
                          'Category::Year',
                          'Category::Distance',
                          'Category::Power',
                          'Category::Gearbox'
                    ),
                    'motos'=>array(
                        'Category::Price',
                        'Category::Year',
                        'Category::Distance',
                        'Category::Displacement',
                        'Category::Gearbox'
                    ),
                    'caravaning'=>array(
                        'Category::Price',
                        'Category::Year',
                        'Category::Distance',

                    ),
                    'utilitaires'=>array(
                        'Category::Price',
                        'Category::Year',
                        'Category::Distance',
                        'Category::Power',

                    ),
                    'equipement_auto'=>array(
                        'Category::Price',

                    ),
                    'equipement_moto'=>array(
                        'Category::Price',

                    ),
                    'equipement_caravaning'=>array(
                        'Category::Price',

                    ),
                    'nautisme'=>array(
                        'Category::Price',

                    ),
                    'equipement_nautisme'=>array(
                        'Category::Price',

                    ),
                    '_immobilier_'=>array(),
                    'ventes_immobilieres'=>array(
                        'Category::Price',
                        'Category::Area',
                        'Category::Roomnumber',
                        'Category::Housetype',

                    ),
                    'locations'=>array(
                        'Category::Price',
                        'Category::Area',
                        'Category::Roomnumber',
                        'Category::Housetype',

                    ),
                    'colocations'=>array(
                        'Category::Price',

                    ),
                    'locations_de_vacances'=>array(
                        'Category::Price',
                        'Category::Date', //create class ability of date selector
                        'Category::People',//create
                        'Category::Room',//create
                    ),
                    'bureaux_commerces'=>array(
                        'Category::Saillocation', //tod create // ability of radio button
                        'Category::Price'
                    ),
                    '_multimedia_'=>'Multimedia',
                    'informatique'=>array(
                        'Category::Price',

                    ),
                    'consoles_jeux_video'=>array(
                        'Category::Price',

                    ),
                    'image_son'=>array(
                        'Category::Price',

                    ),
                    'telephonie'=>array(
                        'Category::Price',

                    ),
                    '_maison_'=>'Maison',
                    'ameublement'=>array(
                        'Category::Price',

                    ),
                    'electromenager'=>array(
                        'Category::Price',

                    ),
                    'arts_de_la_table'=>array(
                        'Category::Price',

                    ),
                    'decoration'=>array(
                        'Category::Price',

                    ),
                    'linge_de_maison'=>array(
                        'Category::Price',

                    ),
                    'bricolage'=>array(
                        'Category::Price',

                    ),
                    'jardinage'=>array(
                        'Category::Price',

                    ),
                    'vetements'=>array(
                        'Category::Price',
                        'Category::Size', //todo implement class and variation dependance

                    ),
                    'chaussures'=>array(
                        'Category::Price',
                        'Category::Shoesize', //todo implement class and variation dependance

                    ),
                    'accessoires_bagagerie'=>array(
                        'Category::Price',

                    ),
                    'montres_bijoux'=>array(
                        'Category::Price',

                    ),
                    'equipement_bebe'=>array(
                        'Category::Price',

                    ),
                    'vetements_bebe'=>array(
                        'Category::Price',
                        'Category::Babysize' // todo implement

                    ),
                    '_loisirs_'=>array(),
                    'dvd_films'=>array(
                        'Category::Price',

                    ),
                    'cd_musique'=>array(
                        'Category::Price',

                    ),
                    'livres'=>array(
                        'Category::Price',

                    ),
                    'animaux'=>array(
                        'Category::Price',
                        'Category::Animaltype' // todo implement

                    ),
                    'velos'=>array(
                        'Category::Price',

                    ),
                    'sports_hobbies'=>array(
                        'Category::Price',

                    ),
                    'instruments_de_musique'=>array(
                        'Category::Price',

                    ),
                    'collection'=>array(
                        'Category::Price',

                    ),
                    'jeux_jouets'=>array(
                        'Category::Price',

                    ),
                    'vins_gastronomie'=>array(
                        'Category::Price',

                    ),
                    '_materiel_professionnel_'=>array(),
                    'materiel_agricole'=>'Materiel Agricole',
                    'transport_manutention'=>'Transport Manutention',
                    'btp_chantier_gros_oeuvre'=>'BTP - Chantier, Gros Oeuvre',
                    'outillage_materiaux_2nd_oeuvre'=>'Outillage materiaux 2nd Oeuvre',
                    'equipements_industriels'=>'Equipements Industriels',
                    'restauration_hotellerie'=>'Restauration Hotellerie',
                    'fournitures_de_bureau'=>'Fournitures de Bureau',
                    'commerces_marches'=>'Commerces & Marchés',
                    'materiel_medical'=>'Materiel Médical',
                    '_emploi_services_'=>'Emplois & Services',
                    'emploi'=>'Emploi',
                    'services'=>'Services',
                    'billetterie'=>'Billetterie',
                    'evenements'=>'Evenements',
                    'cours_particuliers'=>'Cours Particulier',
                    'covoiturage'=>'Covoiturage',
                    '_'=>'--',
                    'autres'=>'Autres',

                );
                break;

            case 'demandes':

                return array();

                break;
        }
    }

    public function after()
    {
        return "Root";
    }
}
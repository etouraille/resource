<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 04/11/14
 * Time: 19:01
 */

namespace OP\LBC\Filters\Category;


class Main extends \OP\LBC\Filter{

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

    }

    public function after()
    {
        return "Root";
    }
}
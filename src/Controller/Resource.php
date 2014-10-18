<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 17/10/14
 * Time: 18:55
 */

namespace OP\Controller;


use OP\Model\ResourceType;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Resource extends Main{

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function createResourceType(Request $request, Application $app)
    {
        $name = $request->get('name');
        $messages = array();
        if(empty($name))
        {
            $messages[] = "Le nom de la ressource ne peux pas être vide";
        }
        $resourceTypeModel = new \OP\Model\ResourceType();
        $rowResourceType = $resourceTypeModel->getRow(array('name'=>$name));
        if($rowResourceType)
        {
            $messages[] = "Une resource avec ce nom existe déjà";
        }
        $return = array();
        if(count($messages)> 0)
        {
            $success = false;
            $return['messages']= $messages;
        }
        else
        {
            $success = true;
            $resourceTypeModel->add(array('name'=>$name));
        }
        $return['success']= $success;
        return $app->json($return);
    }

    public function getResourceType(Request $request, Application $app)
    {
        $resourceTypeModel = new \OP\Model\ResourceType();
        $resources = $resourceTypeModel->getRows(array(),array('name'=>'DESC'));
        return $app->json(array('resources'=>$resources));
    }

    public function addResource(Request $request, Application $app)
    {
        $idMe = $app['idMe'];
        $name = $request->get('name');
        $description = $request->get('description');
        $idResourceType = $request->get('idResourceType');
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        $messages = array();
        if(empty($name))
        {
            $messages[]= "Le nom de la ressource ne peux être vide";
        }
        if(empty($description))
        {
            $messages[]= "La description de la resource ne peut être vide";
        }
        if($idResourceType == 0)
        {
            $messages[] = "Vous devez donner un nom à votre type de resource";
        }
        $json = array();
        if(count($messages) > 0)
        {
            $json['messages'] = $messages;
            $json['success'] = false;
        }
        else
        {
            $json['success'] = true;
            $resourceModel = new \OP\Model\Resource();
            $resourceModel->add(array(
                'idMe'=>$idMe,
                'name'=>$name,
                'description'=>$description,
                'idResourceType'=>$idResourceType,
                'lat'=>$lat,
                'lng'=>$lng,
            ));
        }
        return $app->json($json);
    }

    protected function confirmOrInfirmResource(Request $request, Application $app, $valid)
    {
        $idResource = $request->get('idResource');
        $resourceModel = new \OP\Model\Resource();
        $rowResource = $resourceModel->getRow(array('id'=>$idResource));
        $messages = array();
        if(!$rowResource)
        {
            $messages[]= "La resource invoquée n'existe pas";
        }
        if(count($messages)>0)
        {
            $json['success'] = false;
            $json['messsages'] = $messages;
        }else
        {
            $json['success'] = true;
            $validationResourceModel = new \OP\Model\ValidationResource();
            $validationResourceModel->add(
                array(
                    'idMe'=>$app['idMe'],
                    'idResource'=>$idResource,
                    'valid'=>$valid,
                )
            );
        }
        return $app->json($json);
    }

    public function confirmResource(Request $request, Application $app)
    {
        return $this->confirmOrInfirmResource( $request, $app, 1);

    }

    public function infirmResource(Request $request, Application $app)
    {
        return $this->confirmOrInfirmResource( $request, $app, 0);

    }

    public function takeResource(Request $request, Application $app)
    {
        return $this->confirmOrInfirmResource( $request, $app, 2);

    }

    public function getResource(Request $request, Application $app)
    {
        $lat = $request->get('lat');
        $lng = $request->get('lng');
        $radius = $request->get('radius');
        $resourceModel = new \OP\Model\Resource();
        $resources = $resourceModel->getResource($lat,$lng,$radius);
        return $app->json(array('resources'=>$resources));
    }
}


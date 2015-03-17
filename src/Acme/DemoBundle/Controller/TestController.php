<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function indexAction($page){
        $names = json_encode( array(
            'simone',
            'josephine',
            'giuseppe',
            'gabriele',
            'renato'
        ) );
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        return $response->setContent( $names );
    }
    public function viewAction( $name ) {
        $array = array(
            'nome' => 'Simone',
            'cognome' => 'Rossi'
        );

        $object = (object)$array;
        return $this->render(
            'AcmeDemoBundle:Test:view.html.twig',
            array(
                'name' => $name,
                'my_int' => 10,
                'my_array' => $array,
                'my_object' => $object
            ));
    }
}
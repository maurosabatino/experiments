<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller{
    public function indexAction(){

    }

    public function createAction(Request $request){
        $book = new Book();
        $form = $this->createFormBuilder($book)
            ->add('title', 'text')
            ->add('isbn', 'text')
            ->add('author','text')
            ->add('description', 'textarea')
            ->add('price', 'text')
            ->add('save', 'submit', array('label' => 'Crea libro'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            //inserisco manualmente l'autore per semplificare l'esempio
            $em = $this->getDoctrine()->getManager();


            $em->persist($book);
            $em->flush();

            return $this->redirect($this->generateUrl('_book'));
        }
        return $this->render(
            'AcmeDemoBundle:Book:create.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    public function viewAction( $id ) {
        $book = $this->getDoctrine()
            ->getRepository('AcmeDemoBundle:Book')
            ->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'Nessun libro presente nel database con l\'id '.$id
            );
        }

        return $this->render(
            'AcmeDemoBundle:Book:view.html.twig',
            array(
                'book' => $book
            )
        );
    }

    public function updateAction(){

    }

    public function deleteAction(){

    }

}
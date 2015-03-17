<?php
/**
 * Created by PhpStorm.
 * User: Mauro
 * Date: 14/03/2015
 * Time: 14:55
 */

namespace Acme\DemoBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends AbstractType {
    public function buildForm(FormBuilderInterface $builderInterface, array $array){
        $builderInterface
            ->add('title', 'text')
            ->add('isbn', 'text')
            ->add('description', 'textarea')
            ->add('price', 'text')
            ->add('save', 'submit', array('label' => 'Crea libro'));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return book;
    }
}
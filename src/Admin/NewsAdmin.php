<?php
// src/Admin/NewsAdmin.php

namespace App\Admin;

use App\Entity\News;
use App\Entity\Categories;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


final class NewsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('title', TextType::class)
        ->add('description', TextareaType::class)
        ->add('body', CKEditorType::class,[
            'config' => [
                'uiColor' => '#ffffff',
                'toolbar' => 'full',
                'required' => true
            ]
        ])
        ->add('category', EntityType::class, [
            'class' => Categories::class,
            'choice_label' => 'name',
        ])
        ;


    }
    public function toString($object)
    {
        return $object instanceof Categories
            ? $object->getName()
            : 'News'; // shown in the breadcrumb on the create view
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
        ->addIdentifier('category')
        ->addIdentifier('views')
        ->add('flag', 'choice', [
            'editable' => true,
            'class' => 'App\Entity\News',
            'choices' => [
                'Published' => 'Publish',
                'Not published' => 'Inactive',
            ],
        ]);
        
        
    }

    public function getNewInstance()
    {

    $date = date('Y-m-d');
    $instance = parent::getNewInstance();
    $instance->setviews(0);

    $instance->setDateCreated(\DateTime::createFromFormat('Y-m-d',$date));
    $instance->setDateUpdated(\DateTime::createFromFormat('Y-m-d',$date));
    $instance->setFlag('Not published');
    return $instance;
    }

}



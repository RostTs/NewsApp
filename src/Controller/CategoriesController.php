<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{
    public function list(){
        return $this->render('pages/index.html.twig');
    }
}
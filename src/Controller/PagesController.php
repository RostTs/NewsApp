<?php

namespace App\Controller;

use App\Entity\News; 
use App\Entity\Categories; 
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use  Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilde;

class PagesController extends Controller
{
    public function home(){
  // Checking if category has any news, and update status
      $categories = $this->getDoctrine()->getRepository(Categories::class)->findAll();
      foreach($categories as $category){
      $news = $this->getDoctrine()->getRepository(News::class)->findByCat($category->name);
        if(empty($news)){
         $this->getDoctrine()->getRepository(Categories::class)->chageStatus($category->name,'Empty');

        } else {
          $this->getDoctrine()->getRepository(Categories::class)->chageStatus($category->name,'Not empty');
        }
      }

      // All published news will be shown
      $news = $this->getDoctrine()->getRepository(News::class)->selectPublished();

        return $this->render('pages/index.html.twig',array(
          'news' => $news
        ));
    }

    public function readSingle($id){
      $singleNews = $this->getDoctrine()->getRepository(News::class)->selectById($id);
      $views = $singleNews[0]->views;

      $this->getDoctrine()->getRepository(News::class)->updateViews($views + 1,$id);

      return $this->render('pages/single.html.twig',array(
        'news' => $singleNews,
        'views' => $views + 1
      ));
    }

}
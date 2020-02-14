<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CategoriesRepository extends EntityRepository
{
   public function chageStatus($name,$status){


     $query =  $this->createQueryBuilder('c')
    ->update('App\Entity\Categories','c')
    ->set('c.status', ':status')
    ->where('c.name = :name')
    ->setParameter('name',$name)
    ->setParameter('status',$status)
    ->getQuery();

    $query->execute();


   }
}   
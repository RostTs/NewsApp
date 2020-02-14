<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class NewsRepository extends EntityRepository
{
    public function selectPublished(){
        return $this->createQueryBuilder('n')
        ->where('n.flag = :flag')
        ->setParameter('flag','Published')
        ->getQuery()
        ->getResult();
    }
    public function selectById($id){
        return $this->createQueryBuilder('n')
        ->where('n.id = :id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }

    public function updateViews($views,$id){
        $query =  $this->createQueryBuilder('n')
        ->update('App\Entity\News','n')
        ->set('n.views', ':views')
        ->where('n.id = :id')
        ->setParameter('views',$views)
        ->setParameter('id',$id)
        ->getQuery();
    
        $query->execute();

    }

    public function findByCat($category){
        return $this->createQueryBuilder('n')
        ->where('n.category = :category')
        ->setParameter('category',$category)
        ->getQuery()
        ->getResult();
   }
}
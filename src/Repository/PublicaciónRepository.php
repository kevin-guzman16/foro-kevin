<?php

namespace App\Repository;

use App\Entity\Publicación;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Publicación|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publicación|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publicación[]    findAll()
 * @method Publicación[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicaciónRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publicación::class);
    }

    // /**
    //  * @return Publicación[] Returns an array of Publicación objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Publicación
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Contactform;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Contactform|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contactform|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contactform[]    findAll()
 * @method Contactform[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactformRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contactform::class);
    }

    // /**
    //  * @return Contactform[] Returns an array of Contactform objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contactform
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

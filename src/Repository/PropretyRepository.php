<?php

namespace App\Repository;

use App\Entity\Proprety;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Proprety|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proprety|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proprety[]    findAll()
 * @method Proprety[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropretyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proprety::class);
    }

    public function findLatest(){
        return $this->getAllQB()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }
    private function getAllQB(): QueryBuilder{
        return $this->createQueryBuilder('p')
            ->where('p.sold=false');
    }

    // /**
    //  * @return Proprety[] Returns an array of Proprety objects
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
    public function findOneBySomeField($value): ?Proprety
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

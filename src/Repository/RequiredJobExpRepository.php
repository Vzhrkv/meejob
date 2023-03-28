<?php

namespace App\Repository;

use App\Entity\RequiredJobExp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RequiredJobExp>
 *
 * @method RequiredJobExp|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequiredJobExp|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequiredJobExp[]    findAll()
 * @method RequiredJobExp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequiredJobExpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RequiredJobExp::class);
    }

    public function save(RequiredJobExp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RequiredJobExp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RequiredJobExp[] Returns an array of RequiredJobExp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RequiredJobExp
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

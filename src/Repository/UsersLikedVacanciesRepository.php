<?php

namespace App\Repository;

use App\Entity\UsersLikedVacancies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersLikedVacancies>
 *
 * @method UsersLikedVacancies|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersLikedVacancies|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersLikedVacancies[]    findAll()
 * @method UsersLikedVacancies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersLikedVacanciesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersLikedVacancies::class);
    }

    public function save(UsersLikedVacancies $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UsersLikedVacancies $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UsersLikedVacancies[] Returns an array of UsersLikedVacancies objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsersLikedVacancies
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Repository;

use App\Entity\KeywordVacancy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<KeywordVacancy>
 *
 * @method KeywordVacancy|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeywordVacancy|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeywordVacancy[]    findAll()
 * @method KeywordVacancy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeywordVacancyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KeywordVacancy::class);
    }

    public function save(KeywordVacancy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(KeywordVacancy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return KeywordVacancy[] Returns an array of KeywordVacancy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?KeywordVacancy
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

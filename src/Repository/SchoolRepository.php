<?php

namespace App\Repository;

use App\Entity\School;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<School>
 */
class SchoolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, School::class);
    }

    public function findByCountriesAndPriorities(array $countries, array $priorities): array 
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.location', 'loc')
            ->join('s.rating', 'r')
        ;
        foreach ($countries as $i => $country) {
            $qb->orWhere('loc.country = :country' . $i)
                ->setParameter(':country' . $i, $country["value"])
            ;
        }
        
        foreach ($priorities as $i => $priority) {
            $qb->andWhere('r.' . $priority["name"].  ' >= :priority' . $i)
                ->setParameter(':priority' . $i, $priority["value"]);
        }

        $qb->addSelect('AVG((r.academicValue + r.value + r.campus + r.security + r.location + r.professors) / 6) AS HIDDEN avg_rating')
            ->groupBy('s.id')
            ->orderBy('avg_rating', 'DESC');
        
        return $qb->getQuery()->getResult();
    }

    public function findTopSchools(): array 
    {
        $qb = $this->createQueryBuilder('s')
            ->join('s.rating', 'r')
        ;
        $qb->addSelect('AVG((r.academicValue + r.value + r.campus + r.security + r.location + r.professors) / 6) AS HIDDEN avg_rating')
            ->groupBy('s.id')
            ->orderBy('avg_rating', 'DESC');
        
        return $qb->getQuery()->getResult();
    }
}

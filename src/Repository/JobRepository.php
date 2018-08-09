<?php

namespace App\Repository;
use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }

    /**
     * @param null $keyword
     * @return mixed
     */
    public function getByKeyword($keyword = null)
    {
        $qb = $this->createQueryBuilder('job');
        if (null !== $keyword) {
            $qb->where(
                $qb->expr()->orX(
                    $qb->expr()->like('job.title', ':keyword'),
                    $qb->expr()->like('job.description', ':keyword')
                )
            )->setParameter('keyword', '%' . $keyword . '%');
        }
        $qb->orderBy('job.id', 'desc');
        return $qb->getQuery()->getResult();
    }
}
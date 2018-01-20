<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Project::class);
    }

    public function loadProjectById($id)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :id')
            ->setParameter('name', $name)
            ->setParameter('presentation', $presentation)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

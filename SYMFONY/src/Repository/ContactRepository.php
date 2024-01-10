<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contact>
 *
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

public function getContactsByCategory($categoryId)
    {
        return $this->createQueryBuilder('c')
            ->innerJoin('c.licencies', 'lic')
            ->innerJoin('lic.categorie', 'catego')
            ->where('catego.id = :categoryId')
            ->setParameter('categorieId', $categoryId)
            ->getQuery()
            ->getResult();
    }
}

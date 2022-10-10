<?php

namespace App\Repository;

use App\Entity\License;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;


/**
 * @method License|null find($id, $lockMode = null, $lockVersion = null)
 * @method License|null findOneBy(array $criteria, array $orderBy = null)
 * @method License[]    findAll()
 * @method License[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LicenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, License::class);
    }

    // /**
    //  * @return License[] Returns an array of License objects
    //  */

    /**
     * TODO Verify the format of the license name  Mike says it should be on two lines.
     * @param string $state
     * @param string $name
     * @return array
     */
    public function getDisplayNamesResults(string $state, string $name): array
    {
        $rs = $this->queryForLicensees($state, $name);
        foreach ($rs as $r) {
            if (!empty($r['business_name'])) {
                $r['license_name'] .= ' d.b.a. '.$r['business_name'];
            }
        }
        return $rs;
    }

    /**
     * Query for the licenses to be looked up.
     * @param string $state
     * @param string $name
     * @return array
     */
    public function queryForLicensees(string $state, string $name): array
    {
        $state = strtoupper(trim($state));
        $name = strtoupper(trim($name));
        if (empty($state) || (strlen($name) < 4)) {
            return [];
        }
        $qb = $this->createQueryBuilder('l')
            ->andWhere('l.premiseState = :state')
            ->andWhere('l.businessName like :name OR l.licenseName like :name')
            ->setParameter('state', $state)
            ->setParameter('name', $name.'%')
            ->orderBy('l.licenseName', 'ASC')
            ->orderBy('l.businessName', 'ASC')
            ->setMaxResults(20)
            ->getQuery();

        return $qb->getResult();
    }




    //
    // public function XqueryLicensee($state, $name): array
    // {
    //     $sql = '
    //         SELECT
    //              l.id
    //             ,l.lic_regn
    //             ,l.lic_dist
    //             ,l.lic_cnty
    //             ,l.lic_type
    //             ,l.lic_xprdte
    //             ,l.lic_seqn
    //             ,l.license_name
    //             ,l.business_name
    //             ,l.premise_street
    //             ,l.premise_city
    //             ,l.premise_state
    //             ,l.premise_zip_code
    //             ,l.mail_street
    //             ,l.mail_city
    //             ,l.mail_state
    //             ,l.mail_zip_code
    //             ,l.voice_phone
    //         FROM
    //             license l
    //         WHERE
    //             premise_state = ?
    //             AND
    //             (
    //                 business_name like \'?%\'
    //                 OR
    //                 license_name like \'?%\'
    //             )
    //             ';
    //
    //
    //     $rsm = new ResultSetMapping();
    //
    //
    //     $em = $this->getEntityManager();
    //     $rsm = new ResultSetMappingBuilder($em);
    //
    //
    //     $conn = $em->getConnection();
    //
    //
    //     $query = $em->createNativeQuery($sql, $rsm)
    //
    //
    //    $entityManager =
    //    $rsm = new ResultSetMappingBuilder($entityManager);
    //
    //
    //
    //
    //
    // }


    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?License
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

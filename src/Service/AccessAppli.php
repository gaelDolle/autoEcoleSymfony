<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class AccessAppliService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function findUserCanAccess()
    {
        $conn = $this->em->getConnection();
        $sql = 'SELECT * FROM ecf3_wp_woocommerce_downloadable_product_permissions';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
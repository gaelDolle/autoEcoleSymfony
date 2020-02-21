<?php

namespace App\Controller;

use App\Service\AccessAppliService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(EntityManagerInterface $em)
    {
        $accessAppliRepository = new AccessAppliService($em);
        $values = $accessAppliRepository->findUserCanAccess();
        dump($values);
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}

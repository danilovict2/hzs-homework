<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RankedCollegeController extends AbstractController
{
    #[Route('/rankings', name: 'app_ranked_college')]
    public function index(): Response
    {
        return $this->render('ranked_college/index.html.twig', [
            'controller_name' => 'RankedCollegeController',
        ]);
    }
}
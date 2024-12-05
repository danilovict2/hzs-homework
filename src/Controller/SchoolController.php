<?php

namespace App\Controller;

use App\Entity\School;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SchoolController extends AbstractController
{
    #[Route('/school/{school}', name: 'school_show')]
    public function show(School $school): Response
    {
        return $this->render('school/index.html.twig');
    }
}

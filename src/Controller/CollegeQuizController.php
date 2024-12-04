<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CollegeQuizController extends AbstractController
{
    #[Route('/college-quiz', name: 'college_quiz')]
    public function index(): Response
    {
        return $this->render('college_quiz/index.html.twig');
    }
}

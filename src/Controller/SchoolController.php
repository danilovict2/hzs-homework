<?php

namespace App\Controller;

use App\Entity\School;
use App\Entity\SchoolQuiz;
use App\Repository\SchoolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SchoolController extends AbstractController
{
    #[Route('/school/{school}', name: 'school_show')]
    public function show(School $school): Response
    {
        return $this->render('school/show.html.twig');
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/school-quiz', name: 'school_quiz', methods: ['GET', 'POST'])]
    public function quiz(Request $request, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator): Response
    {
        if ($request->getMethod() === "POST") {
            $quiz = (new SchoolQuiz())
                ->setCountries(json_decode($request->getPayload()->get('countries')))
                ->setPriorities(json_decode($request->getPayload()->get('priorities')))
            ;

            $user = $this->getUser();
            $user->setQuiz($quiz);

            $em->persist($quiz);
            $em->persist($user);
            $em->flush();

            return new JsonResponse($urlGenerator->generate('school_quiz_results'));
        }

        return $this->render('school/quiz.html.twig');
    }

    #[IsGranted("ROLE_USER")]
    #[Route('/school-quiz/results', name: 'school_quiz_results')]
    public function quizResults(SchoolRepository $schoolRepository): Response 
    {
        $schools = $schoolRepository->findByCountriesAndPriorities($this->getUser()->getQuiz()->getCountries(), $this->getUser()->getQuiz()->getPriorities());
        $normalizer = new ObjectNormalizer(defaultContext: [AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => fn () => null]);
        $serializer = new Serializer([$normalizer]);
        return $this->render('school/index.html.twig', [
            'schools' => $serializer->normalize($schools)
        ]);
    }
}

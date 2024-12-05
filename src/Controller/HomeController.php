<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LocationRepository $locationRepository): Response
    {
        $locations = $locationRepository->findAll();
        $normalizer = new ObjectNormalizer(defaultContext: [AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => fn () => null]);
        $serializer = new Serializer([$normalizer]);
        return $this->render('home/index.html.twig', [
            'locations' => $serializer->normalize($locations)
        ]);
    }
}

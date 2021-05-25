<?php

namespace App\Controller;

use App\Entity\Station;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\StationService;

class StationController extends AbstractController
{
    /**
     * @Route("/stations/", name="stations")
     */
    public function all(StationService $stationService): Response
    {
        $repository = $this->getDoctrine()->getRepository(Station::class);
        $stations = $stationService->all($repository);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($stations, 'json');

        return new Response($data);
    }
}

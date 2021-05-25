<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EquipmentQuantityPerDayRepository;
use App\Service\EquipmentService;

class StationController extends AbstractController
{
    /**
     * @Route("/stations/", name="stations")
     */
    public function all($stationId, $day, EquipmentService $equipmentService, EquipmentQuantityPerDayRepository $repository): Response
    {
        $availabilities = $equipmentService->getAvailabilities($stationId, $day, $repository, $this->get('serializer'));

        return new JsonResponse($availabilities);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EquipmentQuantityPerDayRepository;
use App\Service\EquipmentService;

class EquipmentController extends AbstractController
{
    /**
     * @Route("/availabilities/{stationId}/{day}", name="equipment_availabilities")
     */
    public function availabilities($stationId, $day, EquipmentService $equipmentService, EquipmentQuantityPerDayRepository $repository): Response
    {
        $availabilities = $equipmentService->getAvailabilities($stationId, $day, $repository, $this->get('serializer'));

        return new JsonResponse($availabilities);
    }

    /**
     * @Route("/availabilities-html/{stationId}/{day}", name="equipment-availabilities-html")
     */
    public function availabilitesHTML($stationId, $day, EquipmentService $equipmentService, EquipmentQuantityPerDayRepository $repository): Response
    {
        $availabilities = $equipmentService->getAvailabilities($stationId, $day, $repository);
        $contents = $this->renderView('equipment/availabilities.html.twig', [
            'availabilities' => $availabilities,
        ]);

        return new Response($contents);
    }
}

<?php

namespace App\Service;
use App\Repository\EquipmentQuantityPerDayRepository;
use App\Repository\EquipmentQuantityRepository;

class EquipmentService {
    /**
     * @param $stationId
     * @param $day
     * @param EquipmentQuantityPerDayRepository $equipmentQuantityPerDayRepo
     * @param EquipmentQuantityRepository $equipmentQuantityRepo
     * @return array
     * @throws \Exception
     */
    public function getAvailabilities($stationId, $day, EquipmentQuantityPerDayRepository $equipmentQuantityPerDayRepo, EquipmentQuantityRepository $equipmentQuantityRepo)
    {
        try {
            $availabilities = [];

            $equipmentQuantitiesPerDay = $equipmentQuantityPerDayRepo->filterBy($stationId, $day);

            foreach ($equipmentQuantitiesPerDay as $equipmentQuantityPerDay) {
                $availabilities[] = [
                    'name' => $equipmentQuantityPerDay->getEquipmentQuantity()->getEquipment()->getName(),
                    'bookingsCounter' => $equipmentQuantityPerDay->getBookingsCounter(),
                    'available' => $equipmentQuantityPerDay->getEquipmentQuantity()->getQuantity() -  $equipmentQuantityPerDay->getBookingsCounter()
                ];
            }

            if (empty($availabilities)) {
                $equipmentQuantities = $equipmentQuantityRepo->filterBy($stationId);

                foreach ($equipmentQuantities as $equipmentQuantity) {
                    $availabilities[] = [
                        'name' => $equipmentQuantity->getEquipment()->getName(),
                        'bookingsCounter' => 0,
                        'available' => $equipmentQuantity->getQuantity()
                    ];
                }
            }

            return $availabilities;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
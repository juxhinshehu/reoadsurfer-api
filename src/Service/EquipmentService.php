<?php

namespace App\Service;
use App\Repository\EquipmentQuantityPerDayRepository;

class EquipmentService {
    /**
     * @param $stationId
     * @param $day
     * @param EquipmentQuantityPerDayRepository $repository
     * @return array
     * @throws \Exception
     */
    public function getAvailabilities($stationId, $day, EquipmentQuantityPerDayRepository $repository)
    {
        try {
            $availabilities = $repository->getAvailabilities($stationId, $day);

            $availabilitiesFormatted = [];
            foreach ($availabilities as $availability) {
                $availabilitiesFormatted[] = [
                    'name' => $availability->getEquipmentQuantity()->getEquipment()->getName(),
                    'bookingsCounter' => $availability->getBookingsCounter(),
                    'available' => $availability->getEquipmentQuantity()->getQuantity() -  $availability->getBookingsCounter()
                ];
            }

            return $availabilitiesFormatted;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
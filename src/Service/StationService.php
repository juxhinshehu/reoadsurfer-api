<?php

namespace App\Service;

class StationService {
    /**
     * @param $repository
     * @return array
     * @throws \Exception
     */
    public function all($repository)
    {
        try {
            return $repository->findAll();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
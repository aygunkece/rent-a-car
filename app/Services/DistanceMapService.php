<?php

namespace App\Services;

use App\Models\DistanceMap;

class DistanceMapService
{
    public function __construct(public DistanceMap $distanceMap)
    {
    }

    public function create(array $data): DistanceMap|null
    {
        switch ($this->checkPlace($data))
        {
            case 1:
                $this->distanceMap::create(['place' => $data['from'] ]);
                return $this->distanceMap::create(['place' => $data['to'] ]);
            case 2:
                return $this->distanceMap::create(['place' => $data['from'] ]);
            case 3:
                return $this->distanceMap::create(['place' => $data['to'] ]);
            default:
                return null;
        }

    }

    public function getPlace(string $place)
    {
        return $this->distanceMap::query()->where('place', 'LIKE', $place . '%')->get();
    }



    public function checkPlace(array $data)
    {
        $placeFrom = $this->distanceMap::query()->where('place', $data['from'])->get();
        $placeTo = $this->distanceMap::query()->where('place', $data['to'])->get();

        if (count($placeFrom) < 1 && count($placeTo) < 1)
        {
            return 1;
        }
        else if (count($placeFrom) < 1)
        {
            return 2;
        }
        else if (count($placeTo) < 1)
        {
            return 3;
        }
        return 4;
    }

}

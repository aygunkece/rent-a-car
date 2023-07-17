<?php

namespace App\Http\Controllers\Rsa;


use App\Http\Controllers\Controller;
use App\Services\DistanceMapService;
use Illuminate\Http\Request;

class DistanceMapController extends Controller
{
    public function __construct(public DistanceMapService $distanceMapService)
    {
    }

    public function store(Request $request)
    {
       $data = $request->only(['from', 'to']);
       $this->distanceMapService->create($data);

       return redirect()->route('front.index');
    }

    public function getPlace(Request $request)
    {
        $place = $request->place;
        $places = $this->distanceMapService->getPlace($place);

        return $places;
    }

}

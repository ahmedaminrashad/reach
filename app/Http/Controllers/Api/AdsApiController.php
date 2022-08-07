<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AdsService;
use App\Traits\ResponseHelperTrait;
use Illuminate\Http\Request;

class AdsApiController extends Controller
{
    /**
     * @var AdsService
     */
    private $adsService;

    public function __construct(AdsService $adsService)
    {
        $this->adsService = $adsService;
    }

    use ResponseHelperTrait;

    public function getAllAds(Request $request): array
    {


        $filterData = $request->only(['tag_name', 'category_name']);

        $adds = $this->adsService->getFilteredAds($filterData);

        return $this->successResponse($adds);


    }


}

<?php

namespace App\Interfaces;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Collection;

interface AddServiceInterface
{
    public function getAllAds():Collection;

    public function getFilteredAds(array $filteredData): Collection;

    public function createAd(array $ad):Ads;

    public function createAdsArray(array $ads):bool;

    public function getFirstAd():Ads;

}

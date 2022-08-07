<?php


namespace App\Services;


use App\Interfaces\AddServiceInterface;
use App\Models\Ads;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AdsService implements AddServiceInterface
{
    /**
     *
     * @return Collection
     */
    public function getAllAds(): Collection
    {
        return Ads::query()->get();
    }

    /**
     * get filtered ads with relations
     * @param array $filteredData
     * @return Collection
     */
    public function getFilteredAds(array $filteredData): Collection
    {

        return Ads::with(['advertiser', 'category'])
            ->when(isset($filteredData['tag_name']) || isset($filteredData['category_name']), function (Builder $filterQuery) use ($filteredData) {
                $filterQuery->when(isset($filteredData['tag_name']), function (Builder $builder) use ($filteredData) {
                    $builder->whereHas('tags', function (Builder $tagBuilder) use ($filteredData) {
                        $tagBuilder->where('title', 'like', "%{$filteredData['tag_name']}%");
                    });
                });
                $filterQuery->when(isset($filteredData['category_name']), function (Builder $builder) use ($filteredData) {
                    $builder->orWhereHas('category', function (Builder $tagBuilder) use ($filteredData) {
                        $tagBuilder->where('title', 'like', "%{$filteredData['category_name']}%");
                    });
                });
            })->get();

    }


    /**
     *
     * @param array $ad
     * @return Ads
     */
    public function createAd(array $ad): Ads
    {
        return Ads::query()->create($ad)->get();
    }

    /**
     *
     * @param array $ads
     * @return bool
     */
    public function createAdsArray(array $ads): bool
    {
        return Ads::query()->insert($ads);
    }

    /**
     *
     * @return Ads
     */
    public function getFirstAd(): Ads
    {
        return Ads::query()->firstOrFail();
    }


}

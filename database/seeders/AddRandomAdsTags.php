<?php

namespace Database\Seeders;

use App\Services\AdsService;
use App\Services\TagService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddRandomAdsTags extends Seeder
{

    /**
     * @var  AdsService
     */

    private $adsService;

    /**
     * @var  TagService
     */

    private $tagService;


    public function __construct(AdsService $adsService, TagService $tagService)
    {

        $this->adsService = $adsService;
        $this->tagService = $tagService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $firstAdd = $this->adsService->getFirstAd();
        $tags = $this->tagService->getAllTags();

        if (count($tags)) {
            $firstAdd->tags()->sync(collect($tags)->pluck('id'));
        }
    }
}

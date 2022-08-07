<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Services\AdsService;
use App\Services\CategoryService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddRandomDataToAds extends Seeder
{

    /**
     *
     * @var UserService
     */

    private $userService;

    /**
     *
     * @var  AdsService
     */

    private $adsService;

    /**
     *
     * @var  CategoryService
     */

    private $categoryService;


    public function __construct(AdsService $adsService, CategoryService $categoryService,UserService $userService)
    {
        $this->adsService = $adsService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $types = [Ads::$free, Ads::$paid];
        $firstCategory=$this->categoryService->getCategoryById(1);
        $firstUser=$this->userService->getFirstUser();
        $now=Carbon::now()->toDate();
        $addsArray = [];

        for ($i = 1; $i <= 10; $i++)
            $addsArray[] = [
                'type' => array_rand($types),
                'title' => "add# {$i}",
                'description' => "description# {$i}",
                'category_id' => $firstCategory->id,
                'user_id' => $firstUser->id,
                'start_date' => $now,
            ];

        $this->adsService->createAdsArray($addsArray);
    }
}

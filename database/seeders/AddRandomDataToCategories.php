<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Services\AdsService;
use App\Services\CategoryService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddRandomDataToCategories extends Seeder
{
    /**
     *
     * @var CategoryService
     */

    private $categoryService;


    public function __construct( CategoryService $categoryService)
    {
         $this->categoryService = $categoryService;
     }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $categoriesArray = [];

        for ($i = 1; $i <= 10; $i++)
            $categoriesArray[] = [

                'title' => "category# {$i}",

            ];

        $this->categoryService->createCategoryArray($categoriesArray);
    }
}

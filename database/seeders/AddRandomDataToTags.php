<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Services\AdsService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AddRandomDataToTags extends Seeder
{
    /**
     *
     * @var TagService
     */

    private $tagService;


    public function __construct(CategoryService $categoryService, TagService $tagService)
    {
         $this->tagService = $tagService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
         for ($i = 1; $i <= 10; $i++)
            $addsArray[] = [
                'title' => "tag# {$i}",
             ];

        $this->tagService->createTagArray($addsArray);
    }
}

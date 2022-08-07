<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $this->call([
                CreateFirstUser::class,
                AddRandomDataToCategories::class,
                AddRandomDataToAds::class,
                AddRandomDataToTags::class,
                AddRandomAdsTags::class,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Error('Seeder failed, check logs for more details');
        }
    }
}

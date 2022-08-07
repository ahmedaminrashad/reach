<?php

namespace App\Interfaces;

use App\Models\Ads;
use App\Models\Category;

interface CategoryServiceInterface
{
    public function getCategoryById($id):Category;

    public function createCategoryArray(array $categories):bool;



}

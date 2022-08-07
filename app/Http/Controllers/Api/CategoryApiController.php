<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Traits\ResponseHelperTrait;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * @var  CategoryService
     */
    private $categoryService;

    use ResponseHelperTrait;

    public function __construct(CategoryService $CategoryService)
    {
        $this->categoryService = $CategoryService;
    }

    public function getCategory($Category_id): array
    {
        $Category = $this->categoryService->getCategoryById($Category_id);
        return $this->successResponse($Category);
    }

    public function createCategory(Request $request): array
    {
        $Category=$request->only('title');
        $Category = $this->categoryService->createCategory($Category);
        return $this->successResponse($Category);
    }

    public function updateCategory($Category_id,Request $request): array
    {
        //we should make Category Request with validation
        $data=$request->only('title');
        $this->categoryService->updateCategory($Category_id,$data);
        return $this->successResponse();
    }

    public function deleteCategory($Category_id): array
    {

        $Category = $this->categoryService->deleteCategory($Category_id);

        return $this->successResponse();
    }
}

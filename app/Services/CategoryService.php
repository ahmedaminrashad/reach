<?php


namespace App\Services;


use App\Interfaces\CategoryServiceInterface;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{
    /**
     *
     * @param $id
     * @return Category
     */
    public function getCategoryById($id): Category
    {
        return Category::query()->findOrFail($id);
    }

    /**
     *
     * @param array $category
     * @return Category
     */
    public function createCategory(array $category): Category
    {
        return Category::query()->create($category);
    }

    /**
     *
     * @param array $categories
     * @return bool
     */
    public function createCategoryArray(array $categories): bool
    {
        return Category::query()->insert($categories);
    }


    /**
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateCategory(int $id, array $data): bool
    {
        return Category::query()->where('id', $id)->update($data);
    }

    /**
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id): bool
    {
        return Category::query()->where('id', $id)->delete();
    }
}

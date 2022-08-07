<?php

namespace App\Interfaces;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

interface TagServiceInterface
{
    public function createTagArray(array $tags):bool;
    public function createTag(array $tag):Tag;
    public function getAllTags():Collection;
    public function getTagById($id): Tag;
    public function updateTag(int $id,array $data): bool;
    public function deleteTag(int $id): bool;

}

<?php


namespace App\Services;

use App\Interfaces\TagServiceInterface;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;


class TagService implements TagServiceInterface
{
    /**
     *
     * @param array $tags
     * @return bool
     */
    public function createTagArray(array $tags): bool
    {
        return Tag::query()->insert($tags);
    }

    /**
     *
     * @return Collection
     */
    public function getAllTags(): Collection
    {
        return Tag::query()->get();
    }

    /**
     *
     * @param $id
     * @return Tag
     */
    public function getTagById($id): Tag
    {
        return Tag::query()->find($id);
    }

    /**
     *
     * @param $tag
     * @return Tag
     */
    public function createTag($tag): Tag
    {
        return Tag::query()->create($tag);
    }

    /**
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateTag(int $id, array $data): bool
    {
        return Tag::query()->where('id', $id)->update($data);
    }

    /**
     *
     * @param int $id
     * @return bool
     */
    public function deleteTag(int $id): bool
    {
        return Tag::query()->where('id', $id)->delete();
    }


}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Traits\ResponseHelperTrait;
use Illuminate\Http\Request;

class TagsApiController extends Controller
{

    /**
     * @var  TagService
     */
    private $tagService;

    use ResponseHelperTrait;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function getTag($tag_id): array
    {
        $tag = $this->tagService->getTagById($tag_id);
        return $this->successResponse($tag);
    }

    public function createTag(Request $request): array
    {
        $tag=$request->only('title');
        $tag = $this->tagService->createTag($tag);
        return $this->successResponse($tag);
    }
    public function deleteTag($tag_id): array
    {

        $tag = $this->tagService->deleteTag($tag_id);

        return $this->successResponse();
    }

    public function updateTag($tag_id,Request $request): array
    {
        //we should make Tag Request with validation
        $data=$request->only('title');
        $this->tagService->updateTag($tag_id,$data);
        return $this->successResponse();
    }


}

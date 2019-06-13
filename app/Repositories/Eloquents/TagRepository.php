<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TagRepositoryInterface;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Tag::class;
    }

    public function store(Request $request)
    {
        $tag = $this->model->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $tag;
    }

    public function updateTag(Request $request, $tag)
    {
        $tag = $tag->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $tag;
    }
}

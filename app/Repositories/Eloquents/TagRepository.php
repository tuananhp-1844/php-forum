<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Tag::class;
    }

    public function newest()
    {
        return $this->model->orderBy('created_at', 'DESC');
    }
}

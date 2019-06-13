<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Category::class;
    }

    public function store(Request $request)
    {
        $category = $this->model->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $category;
    }

    public function updateCategory(Request $request, $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $category;
    }
}

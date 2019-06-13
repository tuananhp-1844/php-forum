<?php
namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function store(Request $request);
    public function updateCategory(Request $request, $category);
}

<?php
namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface TagRepositoryInterface
{
    public function store(Request $request);
    public function updateTag(Request $request, $tag);
}

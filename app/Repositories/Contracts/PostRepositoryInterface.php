<?php
namespace App\Repositories\Contracts;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function editorChoice();
    public function trending();
}

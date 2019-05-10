<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function register(array $data);
    public function getHighestPoint($limit);
}

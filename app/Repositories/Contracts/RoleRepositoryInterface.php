<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;
use App\Models\Role;

interface RoleRepositoryInterface
{
    public function store(Request $request);
    public function updateRole(Request $request, Role $role);
}

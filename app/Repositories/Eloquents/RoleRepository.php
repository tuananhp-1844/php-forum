<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Role::class;
    }

    public function store(Request $request)
    {
        $role = $this->model->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $role;
    }

    public function updateRole(Request $request, Role $role)
    {
        $role = $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $role;
    }
}

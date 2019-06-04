<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Role::class;
    }
}

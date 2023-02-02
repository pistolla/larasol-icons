<?php

namespace App\Models;

use Spatie\Permission\Models\Role as OriginalRole;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 * required={"name"},
 * @OA\Xml(name="User"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", description="User name"),
 * @OA\Property(property="guard_name", type="string", description="User guard name"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="updated_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_at", ref="#/components/schemas/BaseModel/properties/deleted_at")
 * )
 *
 * Class Role
 *
 */
class Role extends OriginalRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at',
    ];
}

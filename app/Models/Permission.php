<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as OriginalPermission;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 * required={"name"},
 * @OA\Xml(name="Permission"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", readOnly="true", description="Name"),
 * @OA\Property(property="guard_name", type="string", readOnly="true", description="Guard name"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="updated_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_at", ref="#/components/schemas/BaseModel/properties/deleted_at")
 * )
 *
 * Class Permission
 *
 */
class Permission extends OriginalPermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at'
    ];
}

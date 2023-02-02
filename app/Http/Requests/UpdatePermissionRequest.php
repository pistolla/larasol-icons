<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Update Permission Form request",
 *      type="object",
 *      required={"id","name", "guard_name"},
 *      @OA\Xml(name="UpdatePermissionRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string",  description="Name"),
 *      @OA\Property(property="guard_name", type="string", readOnly="true", description="Guard name"),
 * )
 *
 * Class UpdatePermissionRequest
 *
 */
class UpdatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:'.config('permission.table_names.permissions', 'permissions').',name,'.$this->permission->id,
        ];
    }
}

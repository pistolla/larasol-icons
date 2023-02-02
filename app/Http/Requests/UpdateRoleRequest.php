<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Update Role Form request",
 *      type="object",
 *      required={"id","name","guard_name"},
 *      @OA\Xml(name="UpdateRoleRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="name", type="string", description="User name"),
 *      @OA\Property(property="guard_name", type="string", description="User guard name")
 * )
 *
 * Class UpdateRoleRequest
 *
 */
class UpdateRoleRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:'.config('permission.table_names.roles', 'roles').',name,'.$this->role->id,
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Store Permission Form request",
 *      type="object",
 *      required={"id","county_name"},
 *      @OA\Xml(name="StorePermissionRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="county_name", type="string", description="County Name", example="Nairobi")
 * )
 *
 * Class StorePermissionRequest
 *
 */
class StorePermissionRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:'.config('permission.table_names.permissions', 'permissions').',name',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Farm Types Update request",
 *      type="object",
 *      required={"farm_type_name"},
 *      @OA\Xml(name="UpdateFarmTypesRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="farm_type_name", type="string", description="Farm Type Name")
 * )
 *
 * Class UpdateFarmTypesRequest
 *
 */
class UpdateFarmTypesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'farm_type_name' => 'string|min:1|nullable',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['farm_type_name']);

        return $data;
    }

}
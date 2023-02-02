<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Ward Form store request",
 *      type="object",
 *      required={"ward_name"},
 *      @OA\Xml(name="StoreWardRequest"),
 *      @OA\Property(property="ward_id", type="integer", example="1"),
 *      @OA\Property(property="ward_name", type="string", description="Ward Name", example="Starehe"),
 *      @OA\Property(property="county_id", type="integer", example="1"),
 * )
 *
 * Class StoreWardRequest
 *
 */
class StoreWardRequest extends FormRequest
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
            'ward_id' => 'nullable',
            'ward_name' => 'string|min:1|nullable',
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
        $data = $this->only(['ward_id', 'ward_name']);

        return $data;
    }

}
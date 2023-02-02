<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;

/**
 *
 * @OA\Schema(
 *      title="County Form request",
 *      type="object",
 *      required={"county_name"},
 *      @OA\Xml(name="UpdateCountiesRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="county_name", type="string", description="County Name", example="Nairobi")
 * )
 *
 * Class UpdateCountiesRequest
 *
 */
class UpdateCountiesRequest extends FormRequest
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
            'county_name' => 'string|min:1|nullable',
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
        $data = $this->only(['county_name']);

        return $data;
    }

}
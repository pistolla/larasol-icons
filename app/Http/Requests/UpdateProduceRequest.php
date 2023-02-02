<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Update Produce Form request",
 *      type="object",
 *      required={"id","produce_name"},
 *      @OA\Xml(name="UpdateProduceRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="produce_name", type="string",  description="Name")
 * )
 *
 * Class UpdateProduceRequest
 *
 */
class UpdateProduceRequest extends FormRequest
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
        ];
    }
}

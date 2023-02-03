<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Store Farmer Form request",
 *      type="object",
 *      required={"county_name"},
 *      @OA\Xml(name="UpdateFarmerRequest"),
 *      @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 *      @OA\Property(property="national_id", type="string", description="National Id no."),
 *      @OA\Property(property="first_name", type="string", maxLength=32, example="John"),
 *      @OA\Property(property="last_name", type="string", maxLength=32, example="Doe"),
 *      @OA\Property(property="gender", type="string", readOnly="true", description="Gender male or female", example="male"),
 *      @OA\Property(property="dob", type="string", format="date-time", description="Date of Birth", example="2019-02-25"),
 *      @OA\Property(property="email", type="string", format="email", description="Farmer unique email address", example="farmer@gmail.com"),
 *      @OA\Property(property="phone", type="string", description="Farmer phone number", example="254716365943"),
 *      @OA\Property(property="status", type="string", description="Registration status", example="Registered"),
 *      @OA\Property(property="county", type="string", description="Farm County Name", example="Nyeri"),
 *      @OA\Property(property="ward", type="string", description="Farm ward name", example="MATHIOYA"),
 *      @OA\Property(property="village", type="string", description="Farm village name", example="Kariguini"),
 *      @OA\Property(property="farm_type", type="string", description="Type of Farming", example="Subsistence"),
 *      @OA\Property(property="produce", type="string", description="List of farm produce", example="['Mangoes','Cashew Nut']"),
 *      @OA\Property(property="farm_house", type="string", description="Image of farm house", example="img_20230103_220125.jpg"),
 *      @OA\Property(property="terms", type="string", description="Terms and Condition", example="Accepted")
 * )
 *
 * Class UpdateFarmerRequest
 *
 */
class UpdateFarmerRequest extends FormRequest
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

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Profile Update Form request",
 *      type="object",
 *      required={"id","email","password"},
 *      @OA\Xml(name="UpdateProfileRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="email", type="string", description="User email", example="admin@materialize.com"),
 *      @OA\Property(property="password", type="string", description="User Password", example="pass1234")
 * )
 *
 * Class UpdateProfileRequest
 *
 */
class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="County Form request",
 *      type="object",
 *      required={"id","role","email","email_verified_at","first_name","last_name", "location", "about", "password_confirmation"},
 *      @OA\Xml(name="UpdateUserRequest"),
 *      @OA\Property(property="id", type="integer", example="1"),
 *      @OA\Property(property="role", type="integer", description="User role"),
 *      @OA\Property(property="email", type="string", format="email", description="User unique email address", example="user@gmail.com"),
 *      @OA\Property(property="email_verified_at", type="string", format="date-time", description="Datetime marker of verification status", example="2019-02-25 12:59:20"),
 *      @OA\Property(property="first_name", type="string", maxLength=32, example="John"),
 *      @OA\Property(property="last_name", type="string", maxLength=32, example="Doe"),
 *      @OA\Property(property="location", type="string", maxLength=32, example="Location"),
 *      @OA\Property(property="about", type="string", maxLength=32, example="Describe"),
 *      @OA\Property(property="password_confirmation", type="string", maxLength=32, example="Confirmation")
 * )
 *
 * Class UpdateUserRequest
 *
 */
class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ];
    }
}

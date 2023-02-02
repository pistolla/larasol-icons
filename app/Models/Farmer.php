<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 * required={"password"},
 * @OA\Xml(name="User"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="national_id", type="string", description="National Id no."),
 * @OA\Property(property="first_name", type="string", maxLength=32, example="John"),
 * @OA\Property(property="last_name", type="string", maxLength=32, example="Doe"),
 * @OA\Property(property="gender", type="string", readOnly="true", description="Gender male or female", example="male"),
 * @OA\Property(property="dob", type="string", format="date-time", description="Date of Birth", example="2019-02-25"),
 * @OA\Property(property="email", type="string", format="email", description="Farmer unique email address", example="farmer@gmail.com"),
 * @OA\Property(property="phone", type="string", description="Farmer phone number", example="254716365943"),
 * @OA\Property(property="status", type="string", description="Registration status", example="Registered"),
 * @OA\Property(property="county", type="string", description="Farm County Name", example="Nyeri"),
 * @OA\Property(property="ward", type="string", description="Farm ward name", example="MATHIOYA"),
 * @OA\Property(property="village", type="string", description="Farm village name", example="Kariguini"),
 * @OA\Property(property="farm_type", type="string", description="Type of Farming", example="Subsistence"),
 * @OA\Property(property="produce", type="string", description="List of farm produce", example="['Mangoes','Cashew Nut']"),
 * @OA\Property(property="farm_house", type="string", description="Image of farm house", example="img_20230103_220125.jpg"),
 * @OA\Property(property="terms", type="string", description="Terms and Condition", example="Accepted"),
 * @OA\Property(property="created_at", ref="#/components/schemas/BaseModel/properties/created_at"),
 * @OA\Property(property="updated_at", ref="#/components/schemas/BaseModel/properties/updated_at"),
 * @OA\Property(property="deleted_at", ref="#/components/schemas/BaseModel/properties/deleted_at")
 * )
 *
 * Class Farmer
 *
 */
class Farmer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'national_id',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'email',
        'phone',
        'status',
        'county',
        'ward',
        'village',
        'farm_type',
        'produce',
        'farm_house',
        'terms'
    ];
}

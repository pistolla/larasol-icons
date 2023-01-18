<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}

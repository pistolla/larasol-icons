<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'programs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'program_name',
                  'season',
                  'season_start',
                  'season_end',
                  'farm_type_criteria',
                  'farm_produce_criteria',
                  'county_boundary_criteria',
                  'ward_boundary_criteria',
                  'maximum_farmers',
                  'disbursed_amount',
                  'deposited_amount',
                  'status',
                  'organization',
                  'organization_logo',
                  'bank_account'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'deleted_at'
           ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}

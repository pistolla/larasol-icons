<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      required={"program_name"},
 *      @OA\Xml(name="Program"),
 *      @OA\Property(
 *        property="id", 
 *        type="integer", 
 *        readOnly="true", 
 *        example="1"),
 *      @OA\Property(
 *        property="program_name", 
 *        type="string", 
 *        description="Program Name"),
 *      @OA\Property(
 *        property="season", 
 *        type="string", 
 *        description="Season"),
 *      @OA\Property(
 *        property="season_start", 
 *        type="string", 
 *        description="Season Start"),
 *      @OA\Property(
 *        property="season_end", 
 *        type="string", 
 *        description="Season End"),
 *      @OA\Property(
 *        property="farm_type_criteria", 
 *        type="string", 
 *        description="Farm Type Criteria"),
 *      @OA\Property(
 *        property="farm_produce_criteria", 
 *        type="string", 
 *        description="Farm Produce Criteria"),
 *      @OA\Property(
 *        property="county_boundary_criteria", 
 *        type="string", 
 *        description="County Criteria"),
 *      @OA\Property(
 *        property="ward_boundary_criteria", 
 *        type="string", 
 *        description="Ward Criteria"),
 *      @OA\Property(
 *        property="maximum_farmers", 
 *        type="integer", 
 *        description="Maximum Farmers"),
 *      @OA\Property(
 *        property="disbursed_amount", 
 *        type="float", 
 *        description="Disbursed Amount"),
 *      @OA\Property(
 *        property="deposited_amount", 
 *        type="float", 
 *        readOnly="true",
 *        description="Deposited Amount"),
 *      @OA\Property(
 *        property="status", 
 *        type="string", 
 *        description="Status"),
 *      @OA\Property(
 *        property="organization", 
 *        type="string", 
 *        description="Organization"),
 *      @OA\Property(
 *        property="organization_logo", 
 *        type="string", 
 *        description="Organization Logo"),
 *      @OA\Property(
 *        property="bank_account", 
 *        type="string", 
 *        description="Bank account"),
 *      @OA\Property(
 *        property="created_at", 
 *        ref="#/components/schemas/BaseModel/properties/created_at"),
 *      @OA\Property(
 *        property="updated_at", 
 *        ref="#/components/schemas/BaseModel/properties/updated_at"),
 *      @OA\Property(
 *        property="deleted_at", 
 *        ref="#/components/schemas/BaseModel/properties/deleted_at")
 * )
 *
 * Class Program
 *
 */
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Annotations as OA;
/**
 *
 * @OA\Schema(
 *      title="Update Program Form request",
 *      type="object",
 *      required={'program_name', 'season', 'season_start', 'season_end', 'farm_type_criteria', 'farm_produce_criteria', 'county_boundary_criteria', 'ward_boundary_criteria', 'maximum_farmers', 'disbursed_amount', 'deposited_amount', 'status', 'organization', 'bank_account'},
 *      @OA\Xml(name="UpdateProgramRequest"),
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
 *        description="Bank account")
 * )
 *
 * Class UpdateProgramRequest
 *
 */
class UpdateProgramRequest extends FormRequest
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
            'program_name' => 'string|min:1|nullable',
            'season' => 'string|min:1|nullable',
            'season_start' => 'string|min:1|nullable',
            'season_end' => 'string|min:1|nullable',
            'farm_type_criteria' => 'string|min:1|nullable',
            'farm_produce_criteria' => 'string|min:1|nullable',
            'county_boundary_criteria' => 'string|min:1|nullable',
            'ward_boundary_criteria' => 'string|min:1|nullable',
            'maximum_farmers' => 'string|min:1|nullable',
            'disbursed_amount' => 'string|min:1|nullable',
            'deposited_amount' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
            'organization' => 'string|min:1|nullable',
            'organization_logo' => ['file','nullable'],
            'bank_account' => 'string|min:1|nullable',
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
        $data = $this->only(['program_name', 'season', 'season_start', 'season_end', 'farm_type_criteria', 'farm_produce_criteria', 'county_boundary_criteria', 'ward_boundary_criteria', 'maximum_farmers', 'disbursed_amount', 'deposited_amount', 'status', 'organization', 'bank_account']);
        if ($this->has('custom_delete_organization_logo')) {
            $data['organization_logo'] = null;
        }
        if ($this->hasFile('organization_logo')) {
            $data['organization_logo'] = $this->moveFile($this->file('organization_logo'));
        }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }

}
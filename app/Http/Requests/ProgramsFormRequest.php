<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProgramsFormRequest extends FormRequest
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
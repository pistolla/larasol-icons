<?php

namespace App\Http\Livewire;

use App\Models\Counties;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Farmer;
use App\Models\FarmTypes;
use App\Models\Produces;
use App\Models\Wards;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FarmerForm extends Component
{
    use WithFileUploads;

    public $national_id;
    public $first_name;
    public $last_name;
    public $gender;
    public $dob;
    public $email;
    public $phone;
    public $status;
    public $county;
    public $ward;
    public $village;
    public $farm_type;
    public $farm_house;
    public $produce;
    public $terms;

    public $counties;
    public $wards;
    public $produces;
    public $farm_types;

    public $totalSteps = 4;
    public $currentStep = 1;

    public function __construct()
    {
        if (Schema::hasTable('counties') && Schema::hasTable('wards') && Schema::hasTable('farm_types') && Schema::hasTable('produces')) {
            $this->counties = Counties::all();
            $this->wards = Wards::all();
            $this->produces = Produces::take(50)->get();
            $this->farm_types = FarmTypes::all();
        }
    }


    public function mount()
    {
        $this->currentStep = 1;
    }


    public function render()
    {
        return view('livewire.farmer-form');
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'national_id' => 'required|numeric|unique:farmers',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required|string',
                'dob' => 'required|date_format:Y-m-d|before:18 years ago',
                'email' => 'required|email|unique:farmers',
                'phone' => 'required|regex:/^(254)[0-9]{9}$/|unique:farmers'
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'county' => 'required|string',
                'ward' => 'required|string',
                'village' => 'required|string',
                'status' => 'required|string',
                'farm_type' => 'required|string'
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'produce' => 'required|string'
            ]);
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 4) {
            $this->validate([
                'farm_house' => 'required|mimes:jpg,jpeg,png,svg|max:4096',
            ]);
        }

        $farm_photo = 'Farm_' . $this->farm_house->getClientOriginalName();
        $upload_photo = $this->farm_house->storeAs('imagery', $farm_photo);

        if ($upload_photo) {
            $values = array(
                "national_id" => $this->national_id,
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "gender" => $this->gender,
                "email" => $this->email,
                "dob" => $this->dob,
                "phone" => $this->phone,
                "status" => $this->status,
                "county" => $this->county,
                "ward" => $this->ward,
                "village" => $this->village,
                "produce" => json_encode($this->produce),
                "farm_type" => $this->farm_type,
                "farm_house" => $farm_photo,
                "terms" => 'accepted'
            );

            Farmer::insert($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['name' => $this->first_name . ' ' . $this->last_name, 'email' => $this->email];
            return redirect()->route('farmers.index', $data);
        }
    }
}

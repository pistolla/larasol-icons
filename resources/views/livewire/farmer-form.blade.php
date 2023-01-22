<div>
    
     <form wire:submit.prevent="register">

         {{-- STEP 1 --}}

         @if ($currentStep == 1)
             
      
         <div class="step-one">
             <div class="card">
                 <div class="card-header bg-secondary text-white">Register Farmer 1/4 - Personal Details</div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">National ID No.</label>
                                <input type="text" class="form-control" name="national_id" id="national_id" placeholder="Enter national ID no." wire:model="national_id">
                               <span class="text-danger">@error('national_id'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">First name</label>
                                 <input type="text" class="form-control" name="first_name" placeholder="Enter first name" wire:model="first_name">
                                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter last name" wire:model="last_name">
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Gender</label>
                                 <select name="gender" class="form-control" wire:model="gender">
                                        <option value="" selected>Choose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                 </select>
                                 <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Date of Birth</label>
                                 <input type="date" class="form-control" name="dob" placeholder="Enter date of birth" wire:model="dob">
                                 <span class="text-danger">@error('dob'){{ $message }}@enderror</span>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter email address" wire:model="email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Phone</label>
                               <input name="phone" type="text" class="form-control" placeholder="Enter phone number" wire:model="phone">
                               <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                 </div>
             </div>
         </div>
         @endif

         {{-- STEP 2 --}}

         @if ($currentStep == 2)
             
        
         <div class="step-two">
             <div class="card">
                 <div class="card-header bg-secondary text-white">Register Farmer 2/4 - Boundaries</div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">County of residence</label>
                                 <select class="form-control" id="county" name="county" wire:model="county">
                                     <option value="" selected>Select county</option>
                                     @if(!empty($counties))
                                        @foreach ($counties as $region)
                                            <option value="{{ $region->county_name}}">{{$region->county_name }}</option>
                                        @endforeach
                                    @endif
                                 </select>
                                 <span class="text-danger">@error('county'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Ward of residence</label>
                                 <select id="ward" name="ward" class="form-control" wire:model="ward">
                                    <option value="" selected>Select ward</option>
                                    @if(!empty($wards))
                                        @foreach ($wards as $region)
                                            <option value="{{ $region->ward_name}}">{{$region->ward_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                 <span class="text-danger">@error('ward'){{ $message }}@enderror</span>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Village</label>
                                <input id="village" name="village" type="text" class="form-control" placeholder="Enter Estate/Village/Town/City name" wire:model="village">
                                <span class="text-danger">@error('village'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Farm Type</label>
                               <select class="form-control" name="farm_type" id="farm_type" wire:model="farm_type">
                                <option value="" selected>Select Farming Type</option>
                                @if(!empty($farm_types))
                                    @foreach ($farm_types as $type)
                                        <option value="{{ $type->farm_type_name}}">{{$type->farm_type_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                               <span class="text-danger">@error('farm_type'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <label for="">Farmer Status</label>
                               <select class="form-control" name="status" id="status" wire:model="status">
                                <option value="" selected>Select Farmer Status</option>
                                <option value="Registered">Registered</option>
                                <option value="Approved">Approved</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                               <span class="text-danger">@error('status'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                 </div>
             </div>
         </div>

         @endif
         {{-- STEP 3 --}}

         @if ($currentStep == 3)
             
     
         <div class="step-three">
             <div class="card">
                 <div class="card-header bg-secondary text-white">Register Farmer 3/4 - Farming Produce</div>
                 <div class="card-body">
                     Select the farming produce
                     <div class="frameworks d-flex flex-row flex-wrap form-group">
                        @if(!empty($produces))
                            @foreach ($produces as $item)
                            <label for="produce_{{$item->produce_id}}">
                                <input type="checkbox" id="produce_{{$item->produce_id}}" name="produce[]" value="{{$item->produce_name}}" wire:model="produce">&nbsp; {{$item->produce_name}}
                            </label>
                            @endforeach
                        @endif 
                        
                         
                     </div>
                     <span class="text-danger">@error('produce'){{ $message }}@enderror</span>
                 </div>
             </div>
         </div>
         @endif

         {{-- STEP 4 --}}
         @if ($currentStep == 4)
             
     
         <div class="step-four">
             <div class="card">
                 <div class="card-header bg-secondary text-white">Register Farmer 4/4 - Capture Farm House Photo</div>
                 <div class="card-body">
                     Upload image of the farmer on the farm
                     <div class="form-group">
                         <label for="farm_house">Farmer on Farm Image</label>
                         <input type="file" class="form-control" wire:model="farm_house">
                         <span class="text-danger">@error('farm_type'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                         <label for="terms" class="d-block">
                             <input type="checkbox"  id="terms" wire:model="terms"> You must agree with our <a href="#">Terms and Conditions</a>
                         </label>
                         <span class="text-danger">@error('terms'){{ $message }}@enderror</span>
                     </div>
                 </div>
             </div>
         </div>

         @endif

         <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
            @endif
            
            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Validate</button>
            @endif
            
            @if ($currentStep == 4)
                 <button type="submit" class="btn btn-md btn-primary">SAVE</button>
            @endif
                
               
         </div>

     </form>
</div>

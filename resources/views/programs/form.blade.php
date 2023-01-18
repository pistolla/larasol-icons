
<div class="form-group {{ $errors->has('program_name') ? 'has-error' : '' }}">
    <label for="program_name" class="col-md-2 control-label">Program Name</label>
    <div class="col-md-10">
        <input class="form-control" name="program_name" type="text" id="program_name" value="{{ old('program_name', optional($program)->program_name) }}" minlength="1" placeholder="Program Name">
        {!! $errors->first('program_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('season') ? 'has-error' : '' }}">
    <label for="season" class="col-md-2 control-label">Season</label>
    <div class="col-md-10">
        <input class="form-control" name="season" type="text" id="season" value="{{ old('season', optional($program)->season) }}" minlength="1" placeholder="Season">
        {!! $errors->first('season', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('season_start') ? 'has-error' : '' }}">
    <label for="season_start" class="col-md-2 control-label">Start Date</label>
    <div class="col-md-10">
        <input class="form-control" name="season_start" type="text" id="season_start" value="{{ old('season_start', optional($program)->season_start) }}" minlength="1" placeholder="Season Start Date">
        {!! $errors->first('season_start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('season_end') ? 'has-error' : '' }}">
    <label for="season_end" class="col-md-2 control-label">Season End</label>
    <div class="col-md-10">
        <input class="form-control" name="season_end" type="text" id="season_end" value="{{ old('season_end', optional($program)->season_end) }}" minlength="1" placeholder="Season End Date">
        {!! $errors->first('season_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('farm_type_criteria') ? 'has-error' : '' }}">
    <label for="farm_type_criteria" class="col-md-2 control-label">Farm Type Criteria</label>
    <div class="col-md-10">
        <input class="form-control" name="farm_type_criteria" type="text" id="farm_type_criteria" value="{{ old('farm_type_criteria', optional($program)->farm_type_criteria) }}" minlength="1" placeholder="Farm Type Criteria">
        {!! $errors->first('farm_type_criteria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('farm_produce_criteria') ? 'has-error' : '' }}">
    <label for="farm_produce_criteria" class="col-md-2 control-label">Farm Produce Criteria</label>
    <div class="col-md-10">
        <input class="form-control" name="farm_produce_criteria" type="text" id="farm_produce_criteria" value="{{ old('farm_produce_criteria', optional($program)->farm_produce_criteria) }}" minlength="1" placeholder="Farm Produce Criteria">
        {!! $errors->first('farm_produce_criteria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county_boundary_criteria') ? 'has-error' : '' }}">
    <label for="county_boundary_criteria" class="col-md-2 control-label">County Boundary Criteria</label>
    <div class="col-md-10">
        <input class="form-control" name="county_boundary_criteria" type="text" id="county_boundary_criteria" value="{{ old('county_boundary_criteria', optional($program)->county_boundary_criteria) }}" minlength="1" placeholder="County Boundary Criteria">
        {!! $errors->first('county_boundary_criteria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ward_boundary_criteria') ? 'has-error' : '' }}">
    <label for="ward_boundary_criteria" class="col-md-2 control-label">Ward Boundary Criteria</label>
    <div class="col-md-10">
        <input class="form-control" name="ward_boundary_criteria" type="text" id="ward_boundary_criteria" value="{{ old('ward_boundary_criteria', optional($program)->ward_boundary_criteria) }}" minlength="1" placeholder="Ward Boundary Criteria">
        {!! $errors->first('ward_boundary_criteria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('maximum_farmers') ? 'has-error' : '' }}">
    <label for="maximum_farmers" class="col-md-2 control-label">Maximum Farmers</label>
    <div class="col-md-10">
        <input class="form-control" name="maximum_farmers" type="text" id="maximum_farmers" value="{{ old('maximum_farmers', optional($program)->maximum_farmers) }}" minlength="1" placeholder="Maximum Farmers">
        {!! $errors->first('maximum_farmers', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('disbursed_amount') ? 'has-error' : '' }}">
    <label for="disbursed_amount" class="col-md-2 control-label">Disbursed Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="disbursed_amount" type="text" id="disbursed_amount" value="{{ old('disbursed_amount', optional($program)->disbursed_amount) }}" minlength="1" placeholder="Disbursed Amount">
        {!! $errors->first('disbursed_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deposited_amount') ? 'has-error' : '' }}">
    <label for="deposited_amount" class="col-md-2 control-label">Deposited Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="deposited_amount" type="text" id="deposited_amount" value="{{ old('deposited_amount', optional($program)->deposited_amount) }}" minlength="1" placeholder="Deposited Amount">
        {!! $errors->first('deposited_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($program)->status) }}" minlength="1" placeholder="Status">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('organization') ? 'has-error' : '' }}">
    <label for="organization" class="col-md-2 control-label">Organization</label>
    <div class="col-md-10">
        <input class="form-control" name="organization" type="text" id="organization" value="{{ old('organization', optional($program)->organization) }}" minlength="1" placeholder="Organization">
        {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('organization_logo') ? 'has-error' : '' }}">
    <label for="organization_logo" class="col-md-2 control-label">Organization Logo</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="organization_logo" id="organization_logo" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($program->organization_logo) && !empty($program->organization_logo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_organization_logo" class="custom-delete-file" value="1" {{ old('custom_delete_organization_logo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $program->organization_logo }}
                </span>
            </div>
        @endif
        {!! $errors->first('organization_logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_account') ? 'has-error' : '' }}">
    <label for="bank_account" class="col-md-2 control-label">Bank Account</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_account" type="text" id="bank_account" value="{{ old('bank_account', optional($program)->bank_account) }}" minlength="1" placeholder="Bank Account">
        {!! $errors->first('bank_account', '<p class="help-block">:message</p>') !!}
    </div>
</div>


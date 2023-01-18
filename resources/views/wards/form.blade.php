
<div class="form-group {{ $errors->has('ward_name') ? 'has-error' : '' }}">
    <label for="ward_name" class="col-md-2 control-label">Ward Name</label>
    <div class="col-md-10">
        <input class="form-control" name="ward_name" type="text" id="ward_name" value="{{ old('ward_name', optional($wards)->ward_name) }}" minlength="1" placeholder="Ward Name">
        {!! $errors->first('ward_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county_id') ? 'has-error' : '' }}">
    <label for="county_id" class="col-md-2 control-label">County</label>
    <div class="col-md-10">
        <select class="form-control" id="county_id" name="county_id">
        	    <option value="" style="display: none;" {{ old('county_id', optional($wards)->county_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter county here...</option>
        	@foreach ($counties as $key => $county)
			    <option value="{{ $key }}" {{ old('county_id', optional($wards)->county_id) == $key ? 'selected' : '' }}>
			    	{{ $county }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('county_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('county_name') ? 'has-error' : '' }}">
    <label for="county_name" class="col-md-2 control-label">County Name</label>
    <div class="col-md-10">
        <input class="form-control" name="county_name" type="text" id="county_name" value="{{ old('county_name', optional($counties)->county_name) }}" minlength="1" placeholder="County Name">
        {!! $errors->first('county_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


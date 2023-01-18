
<div class="form-group {{ $errors->has('farm_type_name') ? 'has-error' : '' }}">
    <label for="farm_type_name" class="col-md-2 control-label">Farm Type Name</label>
    <div class="col-md-10">
        <input class="form-control" name="farm_type_name" type="text" id="farm_type_name" value="{{ old('farm_type_name', optional($farmTypes)->farm_type_name) }}" minlength="1" placeholder="Farm Type Name">
        {!! $errors->first('farm_type_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('produce_name') ? 'has-error' : '' }}">
    <label for="produce_name" class="col-md-2 control-label">Produce Name</label>
    <div class="col-md-10">
        <input class="form-control" name="produce_name" type="text" id="produce_name" value="{{ old('produce_name', optional($produces)->produce_name) }}" minlength="1" placeholder="Produce Name">
        {!! $errors->first('produce_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


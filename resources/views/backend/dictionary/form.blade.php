<div class="form-group {{ $errors->has('app_id') ? 'has-error' : ''}}">
    <label for="app_id" class="col-md-4 control-label">{{ 'App Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="app_id" type="number" id="app_id" value="{{ $dictionary->app_id or ''}}" required>
        {!! $errors->first('app_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('surface') ? 'has-error' : ''}}">
    <label for="surface" class="col-md-4 control-label">{{ 'surface' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="surface" type="textarea" id="surface" >{{ $dictionary->surface or ''}}</textarea>
        {!! $errors->first('surface', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    <label for="value" class="col-md-4 control-label">{{ 'Value' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="value" type="textarea" id="value" >{{ $dictionary->value or ''}}</textarea>
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cat_name') ? 'has-error' : ''}}">
    <label for="cat_name" class="col-md-4 control-label">{{ 'Cat Name' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="cat_name" type="textarea" id="cat_name" >{{ $dictionary->cat_name or ''}}</textarea>
        {!! $errors->first('cat_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('value_type') ? 'has-error' : ''}}">
    <label for="value_type" class="col-md-4 control-label">{{ 'Value Type' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="value_type" type="textarea" id="value_type" >{{ $dictionary->value_type or ''}}</textarea>
        {!! $errors->first('value_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type" type="number" id="type" value="{{ $dictionary->type or ''}}" >
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

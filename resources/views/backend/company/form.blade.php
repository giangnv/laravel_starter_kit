<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $company->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ $company->phone or ''}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
    <label for="fax" class="col-md-4 control-label">{{ 'Fax' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ $company->fax or ''}}" >
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('postal') ? 'has-error' : ''}}">
    <label for="postal" class="col-md-4 control-label">{{ 'Postal' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="postal" type="text" id="postal" value="{{ $company->postal or ''}}" >
        {!! $errors->first('postal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="{{ $company->address or ''}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cd_id') ? 'has-error' : ''}}">
    <label for="cd_id" class="col-md-4 control-label">{{ 'Cd Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cd_id" type="text" id="cd_id" value="{{ $company->cd_id or ''}}" >
        {!! $errors->first('cd_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('representative') ? 'has-error' : ''}}">
    <label for="representative" class="col-md-4 control-label">{{ 'Representative' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="representative" type="text" id="representative" value="{{ $company->representative or ''}}" >
        {!! $errors->first('representative', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('representative_last_name') ? 'has-error' : ''}}">
    <label for="representative_last_name" class="col-md-4 control-label">{{ 'Representative Last Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="representative_last_name" type="text" id="representative_last_name" value="{{ $company->representative_last_name or ''}}" >
        {!! $errors->first('representative_last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('representative_first_name') ? 'has-error' : ''}}">
    <label for="representative_first_name" class="col-md-4 control-label">{{ 'Representative First Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="representative_first_name" type="text" id="representative_first_name" value="{{ $company->representative_first_name or ''}}" >
        {!! $errors->first('representative_first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('establisted') ? 'has-error' : ''}}">
    <label for="establisted" class="col-md-4 control-label">{{ 'Establisted' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="establisted" type="date" id="establisted" value="{{ $company->establisted or ''}}" >
        {!! $errors->first('establisted', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('listed_id') ? 'has-error' : ''}}">
    <label for="listed_id" class="col-md-4 control-label">{{ 'Listed Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="listed_id" type="number" id="listed_id" value="{{ $company->listed_id or ''}}" >
        {!! $errors->first('listed_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('employees') ? 'has-error' : ''}}">
    <label for="employees" class="col-md-4 control-label">{{ 'Employees' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="employees" type="number" id="employees" value="{{ $company->employees or ''}}" >
        {!! $errors->first('employees', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('capital') ? 'has-error' : ''}}">
    <label for="capital" class="col-md-4 control-label">{{ 'Capital' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="capital" type="number" id="capital" value="{{ $company->capital or ''}}" >
        {!! $errors->first('capital', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="email" type="textarea" id="email" required>{{ $feedback->email or ''}}</textarea>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fb') ? 'has-error' : ''}}">
    <label for="fb" class="col-md-4 control-label">{{ 'Fb' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="fb" type="textarea" id="fb" >{{ $feedback->fb or ''}}</textarea>
        {!! $errors->first('fb', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $feedback->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('create_time') ? 'has-error' : ''}}">
    <label for="create_time" class="col-md-4 control-label">{{ 'Create Time' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="create_time" type="datetime-local" id="create_time" value="{{ $feedback->create_time or ''}}" >
        {!! $errors->first('create_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

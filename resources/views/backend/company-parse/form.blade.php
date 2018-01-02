<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $companyparse->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('bank') ? 'has-error' : ''}}">
    <label for="bank" class="col-md-4 control-label">{{ 'Bank' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="bank" type="text" id="bank" value="{{ $companyparse->bank or ''}}" >
        {!! $errors->first('bank', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
    <label for="birthday" class="col-md-4 control-label">{{ 'Birthday' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="birthday" type="text" id="birthday" value="{{ $companyparse->birthday or ''}}" >
        {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('business_content') ? 'has-error' : ''}}">
    <label for="business_content" class="col-md-4 control-label">{{ 'Business Content' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" name="business_content" id="business_content" rows="10">{{ $companyparse->business_content or ''}}</textarea>
        {!! $errors->first('business_content', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ceo') ? 'has-error' : ''}}">
    <label for="ceo" class="col-md-4 control-label">{{ 'Ceo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ceo" type="text" id="ceo" value="{{ $companyparse->ceo or ''}}" >
        {!! $errors->first('ceo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('company_size') ? 'has-error' : ''}}">
    <label for="company_size" class="col-md-4 control-label">{{ 'Company Size' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="company_size" type="text" id="company_size" value="{{ $companyparse->company_size or ''}}" >
        {!! $errors->first('company_size', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('corporate_position') ? 'has-error' : ''}}">
    <label for="corporate_position" class="col-md-4 control-label">{{ 'Corporate Position' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="corporate_position" type="text" id="corporate_position" value="{{ $companyparse->corporate_position or ''}}" >
        {!! $errors->first('corporate_position', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('corporate_type') ? 'has-error' : ''}}">
    <label for="corporate_type" class="col-md-4 control-label">{{ 'Corporate Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="corporate_type" type="text" id="corporate_type" value="{{ $companyparse->corporate_type or ''}}" >
        {!! $errors->first('corporate_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('empire_code') ? 'has-error' : ''}}">
    <label for="empire_code" class="col-md-4 control-label">{{ 'Empire Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="empire_code" type="text" id="empire_code" value="{{ $companyparse->empire_code or ''}}" >
        {!! $errors->first('empire_code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('employee_no') ? 'has-error' : ''}}">
    <label for="employee_no" class="col-md-4 control-label">{{ 'Employee No' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="employee_no" type="text" id="employee_no" value="{{ $companyparse->employee_no or ''}}" >
        {!! $errors->first('employee_no', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('eng_name') ? 'has-error' : ''}}">
    <label for="eng_name" class="col-md-4 control-label">{{ 'Eng Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="eng_name" type="text" id="eng_name" value="{{ $companyparse->eng_name or ''}}" >
        {!! $errors->first('eng_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
    <label for="fax" class="col-md-4 control-label">{{ 'Fax' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ $companyparse->fax or ''}}" >
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('industry') ? 'has-error' : ''}}">
    <label for="industry" class="col-md-4 control-label">{{ 'Industry' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="industry" type="text" id="industry" value="{{ $companyparse->industry or ''}}" >
        {!! $errors->first('industry', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('market_code') ? 'has-error' : ''}}">
    <label for="market_code" class="col-md-4 control-label">{{ 'Market Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="market_code" type="text" id="market_code" value="{{ $companyparse->market_code or ''}}" >
        {!! $errors->first('market_code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="{{ $companyparse->address or ''}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ $companyparse->phone or ''}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('share_type') ? 'has-error' : ''}}">
    <label for="share_type" class="col-md-4 control-label">{{ 'Share Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="share_type" type="text" id="share_type" value="{{ $companyparse->share_type or ''}}" >
        {!! $errors->first('share_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tax_period') ? 'has-error' : ''}}">
    <label for="tax_period" class="col-md-4 control-label">{{ 'Tax Period' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tax_period" type="text" id="tax_period" value="{{ $companyparse->tax_period or ''}}" >
        {!! $errors->first('tax_period', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tse_code') ? 'has-error' : ''}}">
    <label for="tse_code" class="col-md-4 control-label">{{ 'Tse Code' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tse_code" type="text" id="tse_code" value="{{ $companyparse->tse_code or ''}}" >
        {!! $errors->first('tse_code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="col-md-4 control-label">{{ 'Url' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url" type="text" id="url" value="{{ $companyparse->url or ''}}" >
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>

{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}

<script type="application/javascript" language="javascript">
    $('#url').change(function(e){
        e.preventDefault()
        var companyParseRequest = $.ajax({
            url: '{{route('admin.api-company-parse')}}',
            data: {
                url: $(this).val(),
            }
        })

        companyParseRequest.done(function(data) {
            let result = data.result;
            if (!data.result) return false;
            $.map(result.info, (val, index) => {
                if (index != 'url') {
                    $('#' + index).val(val)
                }
            })
        })

        
    })
    
</script>

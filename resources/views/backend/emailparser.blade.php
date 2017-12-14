@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>Email Parser</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <h2 class="text-center">Email parser</h2>
            <form action="{{route('admin.api-email-parser')}}">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <textarea class="form-control" rows="10" id="email"></textarea>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-default" id="submit">Submit</button>
                </div>
            </form>

            <div id="result" style="display: none;">
            <h3>Signature result</h3>
            <form method="post" class="form">
                <div class="form-group">
                <table class="table table-bordered" id="tbl-result">
                    <thead>
                    <tr>
                        <th>Attribute</th>
                        <th>Actual</th>
                        <th>Expected</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-success" id="save">Save</button>
                </div>
            </form>
            </div>

            <!-- Save success -->
            <div id="success-msg" style="display:none"></div>
        </div><!-- /box-body -->
    </div><!--box box-success-->

    {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}
    <style type="text/css" media="screen">

    #tbl-result tr td{
        vertical-align: middle;
    }
    .even{
        background: #ededed;
    }

    .odd{
        background: #fff;
    }
    </style>
    <script type="application/javascript" language="javascript">
        $('#submit').click(function(e){
            console.log(e);
            var request = $.ajax({
                url: '{{route('admin.api-email-parser')}}',
                type: 'post',
                data: {email: $('#email').val()},
                dataType: 'json',
            })

            request.done(displayResult);
            request.fail(function(e) {
                throw 'Error';
            });
        })

        $('#save').click(function(e){
        var request = $.ajax({
                url: '{{route('admin.api-email-feedback')}}',
                type: 'post',
                data: {email: $('#email').val(), fb: prepareFeedbackData()},
                dataType: 'json',
            })

            request.done(saveFbMsg);
            request.fail(function(e) {
                throw 'Error';
            });
        })

        function prepareFeedbackData() {
            var listFields = ['family_name_kanji', 'given_name_kanji', 'family_name_katakana', 'given_name_katakana', 'email', 'dept', 'position', 'company_name', 'zip', 'prefecture', 'address1', 'address2', 'building', 'mobile', 'tel', 'fax', 'url'];
            var fbFields = {};
            listFields.forEach(function(field) {
                if ($('input[name="'+field+'"]').length && $('input[name="'+field+'"]').val()) {
                fbFields[field] = $('input[name="'+field+'"]').val()
                }
            });

            return fbFields;
        }

        function saveFbMsg(data) {
            let status = data.status == 200 ? 'Success' : 'Error'
            $('#success-msg').html(`<div class="alert alert-${status.toLowerCase()}"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>${status}!</strong> ${data.result}.</div>`);
            $('#result').hide();
            $('#success-msg').show();
        }

        function displayResult(data) {
            console.log(data);
            var result = data.result

            if (!result.signature) {
                return false;
            }
            var isEvenRow = true;
            var ordering = ['family_name_kanji', 'given_name_kanji', 'family_name_katakana', 'given_name_katakana', 'email', 'dept', 'position', 'company_name', 'zip', 'prefecture', 'address1', 'address2', 'building', 'mobile', 'tel', 'fax', 'url'];

            var signatureOrdered = ordering.map(orderItem => {
                return result.signature.hasOwnProperty(orderItem) ? result['signature'][orderItem] : ''
            });
            
            var tbody = signatureOrdered.map((value, index) => {
                var className = isEvenRow ? 'even': 'odd';
                isEvenRow = !isEvenRow;
                return `<tr class="${className}"><td>${ordering[index]}</td><td>${value}</td><td><input class="form-control" type="text" name="${ordering[index]}" value="" /></td><tr>`;
            }).join();
            $('#tbl-result tbody').html(tbody);
            $('#result').show();
        }
    </script>
@endsection

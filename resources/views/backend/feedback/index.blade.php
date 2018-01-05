@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>List feedback</small>
    </h1>
@endsection

@section('content')
    <div class="container-fb">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Feedback</div>
                    <div class="panel-body">
                        <form method="GET" action="{{ url('/admin/feedback') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                {{ Form::select('status', array_merge(['' => 'Select status'], $listStatus), null, ['class' => 'form-control']) }}
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table">
                            <table id="fb-list" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Email</th>
                                        <th width="40%">Feedback content</th>
                                        <th width="5%">Status</th>
                                        <th width="10%">Note</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($feedback as $item)
                                    <tr class={{ $item->status==1 ? "success" : ""}}>
                                        <td>{{ $loop->iteration }} [ID: {{$item->id}}]</td>
                                        <td><textarea class="form-control" row="15" >{{ $item->email }}</textarea></td>
                                        <td class="feedback_content">
                                            <div class="fb_content_origin">{{ $item->fb }}</div>
                                            <div class="fb_content_parse"></div>
                                        </td>
                                        <td>{{ $listStatus[$item->status] }}</td>
                                        <td><p>{{ $item->note }}</p></td>
                                        <td>
                                            <a href="{{ url('/admin/feedback/' . $item->id) }}" title="View Feedback"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/feedback/' . $item->id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/feedback' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Feedback" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>

                                            <button class="btn btn-info btn-xs btn-check-fb" title="Check"><i class="fa fa-check" aria-hidden="true"></i> Check</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $feedback->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="check-modal"  class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Check result</h4>
            </div>
            <div class="modal-body">
                <table id="check-result" class="table table-bordered">
                    <thead>
                        <th>Index</th>
                        <th>Actual</th>
                        <th>Expected</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}

<script type="application/javascript" language="javascript">
    var ordering = [
        'family_name_kanji', 'given_name_kanji', 'family_name_katakana',
        'given_name_katakana', 'email', 'dept', 'position', 'company_name',
        'zip', 'prefecture', 'address1', 'address2', 'building', 'mobile', 'tel', 'fax', 'url'
    ];
    $(document).ready(function(){
        $('#fb-list tr td.feedback_content').each(function() {
            try {
                var jsonObj = JSON.parse($(this).find('.fb_content_origin').html())
                var feedbackOrdered = ordering.map(orderItem => {
                    let key = `fb[${orderItem}]`
                    return jsonObj.hasOwnProperty(key) ? jsonObj[key] : ''
                });

                var newText = feedbackOrdered.map((fb, key) => {
                    if (!fb) {
                        return ''
                    }
                    return `<p><strong>${ordering[key]}</strong>: ${fb}</p>`
                }).join('')
                
                $(this).find('.fb_content_parse').html(newText)
                $(this).find('.fb_content_origin').hide()
                $(this).parent().find('textarea').height($(this).height() - 10)
            } catch (e) {
                return false;
            }
        });

        // Check feedback updated
        $('.btn-check-fb').click(function(e){
            var $this = $(this)
            var emailContent = $this.parent().parent().find('textarea').val()
            var fbContent = JSON.parse($this.parent().parent().find('.fb_content_origin').html())
            var $modal = $('#check-modal')
            var request = $.ajax({
                url: '{{route('admin.api-email-parser')}}',
                type: 'post',
                data: {email: emailContent},
                dataType: 'json',
            })

            request.done(function(data){
                var result = data.result.signature
                if (!result) return
                var feedbackOrdered = ordering.map(orderItem => {
                    let key = `fb[${orderItem}]`
                    return fbContent.hasOwnProperty(key) ? fbContent[key] : ''
                });

                var checkResultText = feedbackOrdered.map((fb, key) => {
                    if (!fb) {
                        return ''
                    }
                    let classOfItem = fb == result[ordering[key]] ? 'bg-success' : 'bg-danger'
                    return `<tr class=${classOfItem}><td>${ordering[key]}</td><td>${result[ordering[key]]}</td><td>${fb}</td></tr>`
                    return `<p class=${classOfItem}><strong>${ordering[key]}</strong>: ${result[ordering[key]]} <mark>[${fb}]</mark></p>`
                }).join('')

                $('#check-result tbody').html(checkResultText)
                $modal.modal({backdrop: 'static', keyboard: false});
            });

            request.fail(function(e) {
                throw 'Error';
            });
        })
    })
    
</script>
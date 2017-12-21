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
                        <div class="table-responsive">
                            <table id="fb-list" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="30%">Email</th>
                                        <th width="45%">Feedback content</th>
                                        <th width="5%">Status</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)
                                    <tr class={{ $item->status ? "success" : ""}}>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td><textarea class="form-control" row="15" >{{ $item->email }}</textarea></td>
                                        <td class="feedback_content">{{ $item->fb }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/admin/feedback/' . $item->id) }}" title="View Feedback"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/feedback/' . $item->id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/feedback' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Feedback" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
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
@endsection

{{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}

<script type="application/javascript" language="javascript">
    $(document).ready(function(){
        $('#fb-list tr td.feedback_content').each(function() {
            try {
                var jsonObj = JSON.parse($(this).html())
                var ordering = [
                    'family_name_kanji', 'given_name_kanji', 'family_name_katakana',
                    'given_name_katakana', 'email', 'dept', 'position', 'company_name',
                    'zip', 'prefecture', 'address1', 'address2', 'building', 'mobile', 'tel', 'fax', 'url'
                ];

                var feedbackOrdered = ordering.map(orderItem => {
                    let key = `fb[${orderItem}]`
                    return jsonObj.hasOwnProperty(key) ? jsonObj[key] : ''
                });

                var newText = feedbackOrdered.map((fb, key) => `<p><strong>${ordering[key]}</strong>: ${fb}</p>`).join('')
                
                $(this).html(newText);
                $(this).parent().find('textarea').height($(this).height() - 10)
            } catch (e) {
                return false;
            }
        });
    })
    
</script>
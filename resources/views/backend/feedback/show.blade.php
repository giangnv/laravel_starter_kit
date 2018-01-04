@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>View feedback #{{ $feedback->id }}</small>
    </h1>
@endsection

@section('content')
    <div class="container-fb">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Feedback {{ $feedback->id }}</div>
                    <div class="panel-body">

                        <a href="{{ URL::previous() }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/feedback/' . $feedback->id . '/edit') }}" title="Edit Feedback"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/feedback' . '/' . $feedback->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Feedback" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <?php
                            $listStatus = ['0' => 'Not yet process', '1' => 'Completed', '2' => 'Not completed'];
                        ?>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $feedback->id }}</td>
                                    </tr>
                                    <tr><th> Email </th><td> {{ $feedback->email }} </td></tr><tr><th> Fb </th><td> {{ $feedback->fb }} </td></tr><tr><th> Status </th><td> {{ $listStatus[$feedback->status] }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>Company Detail {{$companyparse->name}}</small>
    </h1>
@endsection

@section('content')
    <div class="container-company">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Company Detail {{ $companyparse->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/company-parse') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/company-parse/' . $companyparse->id . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/companyparse' . '/' . $companyparse->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $companyparse->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $companyparse->name }} </td></tr><tr><th> Bank </th><td> {{ $companyparse->bank }} </td></tr><tr><th> Birthday </th><td> {{ $companyparse->birthday }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

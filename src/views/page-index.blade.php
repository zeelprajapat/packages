@extends('pageManagemnet-package::layout.app')

@section('content')

@include('pageManagemnet-package::flash-message')
<div class="main1 clearfix">
    <a href="{{ route('page.create')}}" class="pull-right btn btn-primary">Add Page</a>
    <h2>Pages</h2>
</div>
<div>
    <form method="get">
        <div class="form-group row">
            <div class="col-xs-3">
                <input type="text" class="form-control" name="name" value="{{ request()->get('name')}}" placeholder="Search Page">
            </div>
            <div class="col-xs-2">
                <select name="status" class="form-control">
                    <option value="">Search Status</option>
                    <option value="Active" {{ (request()->get('status') == "Active")? "selected" : ""}}>Active</option>
                    <option value="Inactive" {{ (request()->get('status') == "Inactive")? "selected" : ""}}>Inactive</option>
                </select>
            </div>
            <div class="col-xs-2">
                <input type="submit" value="Search" class="btn btn-success">
                <a href="{{ route('page.index')}}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

</div>
<div class="panel-body">
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('name')</th>
                <th>URI</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(is_null($data->first()))
            <tr>
                <td colspan="5">
                    <center>
                        <h4>Page not found.</h4>
                    </center>
                </td>
            </tr>
            @else
            @foreach($data as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->uri}}</td>
                <td>{{$value->status}}</td>
                <td>
                    <div class="text-right">
                        <div class="clearfix">
                            <div class="col-xs-2 pull-right">
                                <form method="POST" style="margin-bottom: 0px;" action="{{ route('page.destroy', ['page' => $value->id])}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger page_delete">Delete</button>
                                </form>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('page.show', ['page' => $value->id])}}" class="btn btn-info">View</a>
                            </div>
                            <div class="col-xs-6  pull-right">
                                <a href="{{ route('page.edit', ['page' => $value->id])}}" class="btn btn-primary">Edit</a>
                            </div>

                        </div>
                    </div>
                </td>
            </tr>

            @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>
</div>
<div class="d-flex justify-content-center">
{!! $data->appends(\Request::except('page'))->render() !!}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/package/js/page-delete.js') }}"></script>
@stop
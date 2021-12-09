<!doctype html>
<html>

<head>
    @extends('includes.head')
</head>

<body>
<div class="container">
    <div class="main">
        <a href="{{ route('page.index')}}" class="btn btn-info">Back</a>
        <center><h2>Page Detail</h2></center>
    </div>
    <table class="table">
        @foreach ($data as $values)
        <tr>
            <th>Page name</th>
            <td>{{ucwords($values->name)}}</td>
        </tr>
        <tr>
            <th>URI</th>
            <td>{{($values->uri)}}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ucfirst($values->title)}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ucfirst($values->description)}}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ucfirst($values->status)}}</td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>{{ucfirst($values->created_at)}}</td>
        </tr>
        @endforeach
    </table>
</div>
</body>

</html>


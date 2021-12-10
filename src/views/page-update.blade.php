@extends('pageManagemnet-package::layout.app')

@section('content')
        <a href="{{ route('page.index')}}" class="btn btn-info">Back</a>
        <h2>Update Page</h2>
    </div>
    @foreach ($data as $value)

    <form method="post" action="{{ route('page.update', ['page' => $value->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <table class="table">
            <tr>
                <td>Page Name</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="name" id="nameID" value="{{ $value->name}}" class="form-control form-control-lg" placeholder="Enter name">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td>URI</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="uri" readonly value="{{$value->uri}}" id="urlID" class="form-control form-control-lg" placeholder="Page uri">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="title" value="{{$value->title}}" class="form-control form-control-lg" placeholder="Enter title">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <div class="col-xs-8">
                        <textarea name="description" value="{{ $value->description}}" class="ckeditor form-control form-control-lg" placeholder="Enter description">{{ $value->description}}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <div class="col-xs-4">
                        <div class="form-check-inline">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="status" value="Active" autocomplete="off" {{ ($value->status == "Active")? "checked" : ""}}>Active</label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="status" value="Inactive" autocomplete="off" {{ ($value->status == "Inactive")? "checked" : ""}}>Inactive</label>
                        </div>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                </td>
            </tr>    
            <tr>
                <td></td>
                <td>
                <div class="col-xs-4">
                    <input type="submit" name="update" value="Update" class="btn btn-primary">
                </div>
                </td>
            </tr>
        </table>
        @endforeach
    </form>
</div>
<script type="text/javascript" src="{{ asset('/package/js/page-add-url.js') }}"></script> 
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script> 
@stop
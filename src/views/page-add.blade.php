@extends('pageManagemnet-package::layout.app')

@section('content')
        <a href="{{ route('page.index')}}" class="btn btn-info">Back</a>
        <h2>Add Page</h2>
    </div>

    <form method="post" action="{{ route('page.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <table class="table">
            <tr>
                <td>Page Name</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-lg" placeholder="Enter name" id="nameID">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>URI</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="uri" value="{{old('uri')}}" id="urlID" class="form-control form-control-lg" placeholder="Enter uri">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <div class="col-xs-4">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control form-control-lg" placeholder="Enter title">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </td>
            </tr>
        
            <tr>
                <td>Description</td>
                <td>
                    <div class="col-xs-8">
                        <textarea name="description" value="{{old('description')}}" class="ckeditor form-control form-control-lg" placeholder="Enter description">{{old('description')}}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <div class="col-xs-4">

                        <div class="form-check-inline">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="status" value="active" autocomplete="off" {{ old('status') == 'active' ? 'checked' : '' }}>Active</label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="status" value="inactive" autocomplete="off" {{ old('status') == 'inactive' ? 'checked' : '' }}>Inactive</label>
                        </div>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <div class="col-xs-4">
                        <input type="submit" name="submit" value="Add" class="btn btn-primary submit_product">
                    </div>
                </td>
            </tr>
        </table>

    </form>
    </center>
</div>
<script type="text/javascript" src="{{ asset('/package/js/page-add-url.js') }}"></script> 
   
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script> 
@stop

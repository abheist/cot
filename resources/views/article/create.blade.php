@extends('layouts.app')

@section('title')
Cot-Blog | Create
@stop

@section('head')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Create Article</div>
                <div class="panel-body">
                  {{ Form::open(array('method' => 'POST', 'route' => ['article.store',Auth::user()->blog->id], 'class' => 'form-horizontal')) }}
               
                   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Body</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="body" id="body" >{{ old('body') }}
                                </textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button title="Post" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Post
                                </button>
                            </div>
                        </div>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')

  {{ Html::script('tinymce/tinymce.min.js') }}

  <script>
 
tinymce.init({
  selector: "textarea",
  
  // ===========================================
  // INCLUDE THE PLUGIN
  // ===========================================
  
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],
  
  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================
  
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
  
  // ===========================================
  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
  // ===========================================
  
  relative_urls: false
  
});
 
</script>

@stop
@extends('main')

@section('title')
Test
@stop

@section('head')

{{ Html::script('tinymce/tinymce.min.js') }}

@stop

@section('content')
{{ Form::open(['url'=> 'article']) }}
{{ Form::text('article_title',null) }}
{{ Form::textarea('article_body',null,['id'=>'article_body']) }}
{{ Form::submit('Submit') }}
{{ Form::close() }}

<script>
 tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  auto_focus: 'article_body',
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
});
</script>
@stop
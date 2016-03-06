<table class="table table-hover">
@foreach($tags as $tag)
	<tr><td onclick="selectTag('{{trim($tag->name)}}');">{{ $tag->name }}</td></tr>
@endforeach

</table>

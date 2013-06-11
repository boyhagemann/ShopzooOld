@foreach($stream as $log)
<div class="media-object">
    <time>{{ $log->created_at }}</time>
    <h4>{{ $log->message }}</h4>
</div>
@endforeach
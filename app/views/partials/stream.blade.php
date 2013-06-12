@foreach($stream as $log)
{{ $log->tokenize() }}
<div class="media-object">
    <time>{{ $log->created_at }}</time>
    <h4>{{ $log->message }}</h4>
</div>
@endforeach
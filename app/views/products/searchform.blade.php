
{{ Form::open(['route' => 'products.search', 'method' => 'post']) }}
{{ Form::text('terms', isset($terms) ? $terms : '') }}
{{ Form::submit('search') }}
{{ Form::close() }}
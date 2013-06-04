
{{ Form::open(['route' => 'products.search', 'method' => 'post', 'class' => 'form-search']) }}
{{ Form::text('terms', isset($terms) ? $terms : '', array('placeholder' => 'Go nuts, go crazy...', 'class' => 'span4 search-query')) }}
{{ Form::submit('search', array('class' => 'btn')) }}
{{ Form::close() }}
   
{{ Form::open(array('route' => 'questions.store')) }}
{{ Form::text('subject', null, array('class' => 'span6', 'placeholder' => 'The question subject...')) }}
{{ Form::textArea('body', null, array('class' => 'span6', 'placeholder' => 'Your question...')) }}
{{ Form::text('name', null, array('class' => 'span5', 'placeholder' => 'Your name...')) }}
{{ Form::text('email', null, array('class' => 'span5', 'placeholder' => 'Your e-mail...')) }}
{{ Form::twBtnGroup(array(
    Form::submit('Ask our advisors', array('class' => 'btn btn-primary btn-large'))
)) }}
{{ Form::close() }}
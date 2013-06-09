   
{{ Form::open(array('route' => 'questions.store')) }}
{{ Form::twText('The question subject', 'subject', null, array('class' => 'span6')) }}
{{ Form::twTextArea('Your question', 'body', null, array('class' => 'span6')) }}
{{ Form::twText('Your e-mail', 'email', null, array('class' => 'span6')) }}
{{ Form::twBtnGroup(array(
    Form::submit('Ask our advisors', array('class' => 'btn btn-primary btn-large'))
)) }}
{{ Form::close() }}
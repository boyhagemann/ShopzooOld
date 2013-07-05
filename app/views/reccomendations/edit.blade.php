
<h1>Reccomendation to {{ $reccomendation->friend->name() }}</h1>

<hr>

{{ Form::model($reccomendation, array('route' => array('reccomendations.send', $reccomendation->id))) }}
{{ Form::twText('Subject', 'subject', null, array('class' => 'span6')) }}
{{ Form::twTextArea('Body', 'body', null, array('class' => 'span6')) }}
{{ Form::twBtnGroup(array(
	Form::submit('Send', array('class' => 'btn btn-large btn-primare'))
)) }}
{{ Form::close() }}

@extends('layout')
@section('content')
<section class="header section-padding">
	<div class="background">&nbsp;</div>
	<div class="container">
		<div class="header-text">
			<h1>Create</h1>
			<p>
				Create tasks page
			</p>
		</div>
	</div>
</section>

<div class="container">
	<section class="section-padding">
		<div class="jumbotron text-center">
			<h1>Create A Task</h1>

			{{ Form::open(array('url'=> '/create', 'class'=>'form')) }}
			<div class="form-group">
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class'=>'form-control')) }}
			</div>

			<div>
				{{ Form::label('body', 'Body:') }}
				{{ Form::textarea('body', null, array('class'=>'form-control')) }}
			</div>
			<div>
				{{ Form::submit('Create Task', array('class'=>"btn btn-primary")) }}
			</div>
			{{ Form::close() }}

		</div>
	</section>
</div>
@stop
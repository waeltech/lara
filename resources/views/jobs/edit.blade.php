@extends('layouts.app')

@section('content')

	<div class="row">
		{!! Form::model($job, ['route' => ['job.update', $job->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('Title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
			
			{{ Form::label('Description', "Description:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('description', null, ['class' => 'form-control']) }}

			{{ Form::label('Salary', "Salary:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('salary', null, ['class' => 'form-control']) }}

			{{ Form::label('Location', "Location:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('location', null, ['class' => 'form-control']) }}
			@can('approve-job')
			{{ Form::label('Active', "Active:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('approved', null, ['class' => 'form-control']) }}
			@endcan
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($job->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($job->updated_at)) }}</dd>
				</dl>
				

				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('job.index', 'Cancel', array(), array('class' => 'large button red')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'large button green']) }}
					</div>
				</div>

				

			</div>
		</div>
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop
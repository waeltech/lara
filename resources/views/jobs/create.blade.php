@extends('layouts.app')


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Job</h1>
			<hr>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			{!! Form::open(array('route' => 'job.store', 'data-parsley-validate' => '')) !!}
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'maxlength' => '255', 'placeholder' =>'Job title not more than 100 character')) }}


				{{ Form::label('description', "Job description:") }}
				{{ Form::textarea('description', null, array('class' => 'form-control textarea', 'placeholder' =>'job description not more than 3000 characters')) }}

				{{ Form::label('salary', 'salary:') }}
				{{ Form::text('salary', null, array('class' => 'form-control', 'maxlength' => '10', 'placeholder' =>'eg.: 1000')) }}

				{{ Form::label('location', 'location:') }}
				{{ Form::text('location', null, array('class' => 'form-control', 'maxlength' => '100', 'placeholder' =>'job location ex.: Leeds')) }}

				{{ Form::label('skills', 'this job requires:') }}

				@foreach($skills as $skill)
					<div class='col'>
					<p>{{$skill->name}}
					<input type="checkbox" name="skills[]" id="{{$skill->id}}" value="{{$skill->id}}"> </p>
					</div>
				@endforeach
				
				<div class='row'>
				{{ Form::submit('Create Job', array('class' => 'large button green', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
			</div>
		</div>
						
	</div>


@endsection


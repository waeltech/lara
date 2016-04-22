@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1> Job Title : {{ $job->title }}</h1>
			<p> Sallary : {{ $job->salary }}</p>
			<p> Location: {{ $job->location }}</p>
			<hr>
			<p>Job Description</p>
			<p class="lead">{{ $job->description }}</p>
			<p> this job requires skills : </p>
			@foreach($job->skills as $skill)
			 <li>  {{$skill->name}} </li>
			@endforeach



		</div>

		<div class="col-md-4">
			<div class="well">
				
				<hr>
				<div class="row">
					<div class="col-sm-6">
					    {{ Form::open(['url' => 'job/' . $job->id, 'method' => 'POST']) }}
					  	@if( Auth::check())
                        {{ Form::submit('Apply', ['class' => 'large button blue'])}}
   					    @endif
                        {{ Form::close() }}
                        {{ Html::linkRoute('job.index', '<< See All jobs', array(), ['class' => 'large button green']) }}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
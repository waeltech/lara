@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $job->title }}</h1>
			
			<p class="lead">{{ $job->description }}</p>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($job->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($job->updated_at)) }}</dd>
				</dl>
						{{ Form::open(['url' => 'job/assign/' . $job->id, 'method' => 'POST']) }}

						@foreach($job->user as $user)
							<p>{{$user->name}}
							<input type="checkbox" name="users[]" id="{{$user->id}}" value="{{$user->id}}">
							{{$user->id}}</p>
						@endforeach
						<hr>
						{{ Form::open(['url' => 'job/assign/' . $job->id, 'method' => 'POST']) }}
                        {{ Form::submit('Assign', ['class' => 'large button blue'])}}
                        {{ Html::linkRoute('job.index', '<< See All jobs', array(), ['class' => 'large button green']) }}
                        {{ Form::close() }}
				</div>


			</div>
		</div>
	</div>

@endsection
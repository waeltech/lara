@extends('layouts.app')


@section('content')

	<div >
		@if( Auth::check())
	    @foreach (Auth::user()->roles as $role)
	    {{$role->name}}
	    @endforeach
		@endif
		
		

		<div class="col-md-10">
			<h1>Jobs need approval </h1>
			<p> Please select jobs and click approve all </p>
			<p> or click view a single job and click approve </p>
			<a href="{{ route('job.create') }}" class="large button green"> + Create New Job</a>
			{{ Form::open(['url' => 'admin/approve' , 'method' => 'POST']) }}
            {{ Form::submit('Approve Selected', ['class' => 'large button blue'])}}
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th> Actions</th>
				</thead>

				<tbody>
					
					@foreach ($jobs as $job)
						
						<tr>
							<td> <input type="checkbox" name="SelectedJobs[]" id="{{$job->id}}" value="{{$job->id}}"></td>
							<td>{{ $job->title }}</td>
							<td>{{ substr($job->description, 0, 50) }}{{ strlen($job->description) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($job->created_at)) }}</td>
							<td>            

								<a href="{{ route('job.show', $job->id) }}" class="large button green">View</a> 
								@can ('edit-job')
									<a href="{{ route('job.edit', $job->id) }}" class="large button blue">Edit</a> 
								@endcan
								
							</td>
						</tr>

					@endforeach
				{{ Form::close() }}
				</tbody>
			</table>



			<div class="text-center">
				
			</div>
		</div>
	</div>

@stop
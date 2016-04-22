@extends('layouts.app')


@section('content')


			


	<div class="row">
			<h1>All Jobs</h1>
			<p>  Click view job to see the job details and then you can click applay </p>
			<div class='center'>
			@can ('create-job')
				<a href="{{ route('job.create') }}" class="large button green"> + Create New Job</a>
				@endcan
			</div>
	</div>
    	
		

	<div class="row">
		<table class="table">
			<thead>
				<th>Title</th>
				<th>description</th>
				<th>Job Active</th>
				<th> Actions</th>
			</thead>

			<tbody>
				
				@foreach ($jobs as $job)
					
					<tr>
						<td>{{ $job->title }}</td>
						<td>{{ substr($job->description, 0, 50) }}{{ strlen($job->description) > 50 ? "..." : "" }}</td>
						</td>
						<td> @if ($job->approved == 1)
							Yes
							@else
							No
							@endif
						</td>
						<td> 
							
							{!! Form::open(['route' => ['job.destroy', $job->id], 'method' => 'DELETE']) !!}

							<a href="{{ route('job.show', $job->id) }}" class="large button green">View</a> 

							@can ('edit-job')
								<a href="{{ route('job.edit', $job->id) }}" class="large button blue">Edit</a> 
							@endcan

							@can ('delete-job')
							{!! Form::submit('Delete', ['class' => 'large button red']) !!}
							@endcan

							@can ('assign-job')
								<a href="{{ URL('job/assign', $job->id) }}" class="large button blue">Assign</a> 
							@endcan
							
							{!! Form::close() !!}
			                
			                @can('approve-job')
							{{ Form::open(['url' => 'job/approve/' . $job->id, 'method' => 'POST']) }}
			                {{ Form::submit('Approve', ['class' => 'large button blue']) }}
		                    {{ Form::close() }}
		                     @endcan


						</td>
					</tr>

				@endforeach

			</tbody>
		</table>

		<div class="col-centered">
			<div class="pagination"> {{ $jobs->links() }} </div>
		</div>

		
	</div>


@stop
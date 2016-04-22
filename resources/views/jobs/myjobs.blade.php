@extends('layouts.app')


@section('content')

	
	<div class="row">
		<div class="col-md-12">
			<h1> This is a list of jobs you have applied for </h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Accepted</th>
					<th> Actions</th>
				</thead>

				<tbody>
					
					@foreach ($jobs as $job)
					<tr>
						<td>{{ $job->id }}</td>
						<td>{{ $job->title }}</td>
						<td>{{ substr($job->description, 0, 50) }}{{ strlen($job->description) > 50 ? "..." : "" }}</td>
						<td> 
							@if ($job->userjobs->accepted == 0)
							<p> No </p>
							@else
							<p> Yes </p>
							@endif
						</td>
						<td> 
							action
							<a href="{{ route('job.show', $job->id) }}" class="large button green">View</a> 
						</td>
					</tr>
						

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				
			</div>
		</div>
	</div>

@stop
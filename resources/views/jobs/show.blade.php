@extends('layouts.app')

@section('content')

    <div class="container">
	
		<div class="row">
			<label for="title" class="col-sm-offset-2 col-sm-4 control-label">Title</label>

			<div class="col-sm-4">
				{{ $job->title }}
			</div>
		</div>

		

		<div class="row">
			<label for="salary" class="col-sm-offset-2 col-sm-4 control-label">salary</label>

			<div class="col-sm-4">
				{{ $job->salary }}
			</div>
		</div>

		<div class="row">
			<label for="location" class="col-sm-offset-2 col-sm-4 control-label">location</label>

			<div class="col-sm-4">
				{{ $job->location }}
			</div>
		</div>

		<div class="row">
			<label for="description" class="col-sm-offset-2 col-sm-4 control-label">Description</label>

			<div class="col-sm-4">
				{{ $job->description }}
			</div>
		</div>

			
    </div>

@endsection
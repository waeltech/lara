@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Homepage</div>

                <div class="panel-body">
                    {!! Form::open(['url'=>'jobs/edit', 'method'=>'POST']) !!}
                        <input type="hidden" id="job_id" name="job_id" value="{{ $job->id }}" /> 
                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', $job->title, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', $job->description, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('salary', 'Salary:', ['class' => 'control-label']) !!}
                            {!! Form::text('salary', $job->salary, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location', 'Location:', ['class' => 'control-label']) !!}
                            {!! Form::text('location', $job->location, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactn', 'Contact Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('contact_name', $job->contact_name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contacte', 'Contact E-mail:', ['class' => 'control-label']) !!}
                            {!! Form::text('contact_email', $job->contact_email, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Save Changes', ['class' => 'large button green']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

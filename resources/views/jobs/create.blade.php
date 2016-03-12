@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Homepage</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'jobsController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('salary', 'Salary:', ['class' => 'control-label']) !!}
                            {!! Form::text('salary', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location', 'Location:', ['class' => 'control-label']) !!}
                            {!! Form::text('location', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactn', 'Contact Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contacte', 'Contact E-mail:', ['class' => 'control-label']) !!}
                            {!! Form::text('contact_email', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Create New Task', ['class' => 'large button green']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

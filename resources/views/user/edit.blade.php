@extends('layouts.app')


@section('content')
<div class='row'>
@if( Auth::check() )
    @if (auth()->user()->isAdmin())
        <div class='col-lg-4 col-lg-offset-4'>

            @if ($errors->has())
                @foreach ($errors->all() as $error)
                    <div class='bg-danger alert'>{{ $error }}</div>
                @endforeach
            @endif

            <h1><i class='fa fa-user'></i> Edit User</h1>

            {{ Form::model($user, ['role' => 'form', 'url' => 'admin/users/' . $user->id, 'method' => 'PUT']) }}

            
            <div class='form-group'>
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
            </div>


            <div class='form-group'>
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
            </div>
            <div class='form-group'>
                {{ Form::label('Role', 'Role Type') }}

                {{ Form::select('role', $rolelists) }}

            </div>

            <div class='form-group'>
                {{ Form::submit('Update', ['class' => 'large button blue']) }}
            </div>

            {{ Form::close() }}

        </div>
        @else
            <h1> Sorry Only Admin can see this page </h1>
    @endif
    
@endif
</div>

@stop
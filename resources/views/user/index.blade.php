@extends('layouts.app')


@section('content')


	
    @if( Auth::check() )   
           @if (auth()->user()->isAdmin())
                <div class="row">

                <h1><i class="fa fa-users"></i> User Management</h1>

                <div class="center"><a href="users/create" class="large button green">Add User</a></div>


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Date/Time Added</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                @foreach ($user->roles as $role)
                                {{$role->name}}
                                @endforeach
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                <td>
                                    <a href="users/{{ $user->id }}/edit" class="large button blue" style="margin-right: 3px;">Edit</a>
                                    {{ Form::open(['url' => 'admin/users/' . $user->id, 'method' => 'DELETE']) }}
                                    {{ Form::submit('Delete', ['class' => 'large button red'])}}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>


            </div>

           @else
             <h1> Sorry Only Admin can see this page </h1>
           @endif
    @endif
        

    

@stop
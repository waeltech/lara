@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h1>Welcome to my design page.</h1>

                     <h1> users table </h1>
                     <h1> laravel has secuirty and password can not be displayed, all user passwords is 123456</h1>

                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>remember_token</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                

                            </thead>

                            @foreach ($users as $user)
                                <tr>

                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->remember_token }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            @endforeach

                        </table>


                        <h1> role_user table </h1>
                        <table class="table">
                            <thead>
                                <th>user_id</th>
                                <th>role_id</th>
                                
                                

                            </thead>
                            @foreach ($userroles as $userrole)
                            

                                <tr>
                                    <td>{{ $userrole->user_id }}</td>
                                    <td>{{ $userrole->role_id }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </table>

                        <h1> roles table </h1>
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>name</th>
                                <th>label</th>
                                <th>description</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                

                            </thead>
                            @foreach ($roles as $role)
                            

                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->label }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    
                                </tr>
                            @endforeach
                        </table>






                        <h1> job_user table </h1>
                        <table class="table">
                            <thead>
                                <th>job_id</th>
                                <th>user_id</th>
                                <th>accepted</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                

                            </thead>
                            @foreach ($jobsusers as $jobuser)
                            

                                <tr>
                                    <td>{{ $jobuser->job_id }}</td>
                                    <td>{{ $jobuser->user_id }}</td>
                                    <td>{{ $jobuser->accepted }}</td>
                                    <td>{{ $jobuser->created_at }}</td>
                                    <td>{{ $jobuser->updated_at }}</td>
                                    
                                </tr>
                            @endforeach
                        </table>
                    
                    <h1> Jobs table </h1>
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>title</th>
                                <th>description</th>
                                <th>salary</th>
                                <th>location</th>
                                <th>startingdate</th>
                                <th>endingdate</th>
                                <th>user_id</th>
                                <th>approved</th>
                                <th>created_at</th>
                                <th>updated_at</th>

                            </thead>
                            @foreach ($jobs as $job)
                            

                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->description }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ $job->startingdate }}</td>
                                    <td>{{ $job->endingdate }}</td>
                                    <td>{{ $job->user_id }}</td>
                                    <td>{{ $job->approved }}</td>
                                    <td>{{ $job->created_at }}</td>
                                    <td>{{ $job->updated_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    <h1> premissions table </h1>
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>name</th>
                                <th>label</th>
                                <th>desciption</th>
                                <th>created_at</th>
                                <th>updated_at</th>

                            </thead>
                            @foreach ($permissions as $permission)
                            

                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->label }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>{{ $permission->updated_at }}</td>
                                    
                                </tr>
                            @endforeach
                        </table>
                    <h1> premission_role table </h1>
                        <table class="table">
                            <thead>
                                <th>permission_id</th>
                                <th>role_id</th>
                                

                            </thead>
                            @foreach ($permissionroles as $permissionrole)
                            

                                <tr>
                                    <td>{{ $permissionrole->permission_id }}</td>
                                    <td>{{ $permissionrole->role_id }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </table>


                    <h1> skills table </h1>
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>name</th>
                                <th>label</th>
                                <th>description</th>
                                <th>created_at</th>
                                <th>updated_at</th>

                                

                            </thead>
                            @foreach ($skills as $skill)
                            

                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->label }}</td>
                                    <td>{{ $skill->description }}</td>
                                    <td>{{ $skill->created_at }}</td>
                                    <td>{{ $skill->updated_at }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </table>

                        <h1> job_skill table </h1>
                        <table class="table">
                            <thead>
                                <th>job_id</th>
                                <th>skill_id</th>
                                

                            </thead>
                            @foreach ($jobskills as $jobskill)
                            

                                <tr>
                                    <td>{{ $jobskill->job_id }}</td>
                                    <td>{{ $jobskill->skill_id }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </table>

                        <h1> user_skill table </h1>
                        <table class="table">
                            <thead>
                                <th>user_id</th>
                                <th>skill_id</th>
                                

                            </thead>
                            @foreach ($userskills as $userskill)
                            

                                <tr>
                                    <td>{{ $userskill->user_id }}</td>
                                    <td>{{ $userskill->skill_id }}</td>
                                    
                                    
                                </tr>
                            @endforeach
                        </table>


                    
                   

                </div>
            </div>
        </div>
    </div>
@endsection

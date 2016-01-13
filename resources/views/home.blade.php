@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                    User Name :  {{ Auth::user()->name }} <br>
                    User address :  {{ Auth::user()->address }} <br>
                    User phone :  {{ Auth::user()->phone }} <br>
                    User city :  {{ Auth::user()->city }} <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

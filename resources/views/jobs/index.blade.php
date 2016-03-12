@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Jobs Page</div>
                
                <a href="create"><button class="large button green"> + Add New Job </button> </a>

                <div class="panel-body">
                    
                    @if(count($jobs) === 0)
                     <h1>  there is no jobs avilable at the moment</h1>
                     @endif

                     @if(count($jobs) > 0)
                     <h3> We have found {{ count($jobs) }} jobs avilable </h3>
                     @endif
                     
                     @foreach ($jobs as $job)
                     <table>
                         <tr>
                                <!-- Vacancy Name -->
                                <td class="table-text col-md-8">
                                    {{ $job->title }}

                                </td>
                                <td>
                                    <a href="show/{{ $job->id }}"><button class="large button blue"> View </button> </a>
                                    <a href="edit/{{ $job->id }}"><button class="large button blue"> Edit </button> </a>
                                    <form action="delete/{{ $job->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="large button red">Delete</button>
                                    </form>
                                </td>
                        </tr>
                            
                    </table>            
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <ul>
                        @if ($user->task->count())
                            @foreach ($user->task as $tasks)
                                @if($tasks->isComplete)
                                <li class="wrap"><strike>{{$tasks->title}}</strike>
                                @else
                                <li class="wrap">{{$tasks->title}}
                                @endif    
                    
                                    <form class="inline" action="/delete/{{$tasks->id}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                        <span class="form-group">
                                            <button type="submit" class="btn btn-danger btn-sm pull-right">Delete Task</button>    
                                        </span>

                                    </form>

                                    <form class="inline" action="/complete/{{ $tasks->id }}" method="POST">                        
                                        {{ csrf_field() }}
                                                
                                        <span class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm pull-right">Completed</button>
                                        </span>

                                    </form>
                                </li>
                                <br>

                            @endforeach
                        @else
                            <p>You have no tasks!</p>
                        @endif
                    </ul>
                </div>

            </div>

        <div class="panel panel-info">
            
            <div class="panel-heading">Add a task</div>            
            
            <div class="panel-body">    
                <form method="POST" action="/store">

                {{ csrf_field() }}
                
                    <div class="form-group">
                        <label for="title">Task title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Task</button>
                    </div>
                </form>

                @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>           
        </div>
        
    </div>


</div>

{{-- Footer section --}}

<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <p class="navbar-text pull-left">© 2017 - Site Built By 
            <a href="https://github.com/Arpityadav" target="_blank" >Arpit Yadav</a>
        </p>

        <a href="https://github.com/Arpityadav/todoList" class="navbar-btn btn-danger btn pull-right">
            <span class="glyphicon glyphicon-star"></span>  Contribute us at Github
        </a>
    </div>
</div>

@endsection

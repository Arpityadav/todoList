@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    @if ($user->task->count())
                        @foreach ($user->task as $tasks)
                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{ $tasks->title }}
                                        </a>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            {{ $tasks->body }}
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                                
                        @endforeach
                    @else
                        <p>You have no tasks!</p>
                    @endif
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
                        <label for="body">Task Body (not required)</label>
                        <textarea class="form-control noresize" name="body"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Task</button>
                    </div>
                </form>
            </div>           
        </div>
            
    </div>
</div>
    
</div>

@endsection

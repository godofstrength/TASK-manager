@extends('layouts.companydashboard')
@section('css')
<style>
 
  .card-header{
    color:black;
  }
  .fa-ellipsis-v{
    float: right;
  }
.pending{
    border-left: 4px solid black;
  }
.completed{
  border-left : 4px solid #28a745;
}
.ongoing{
  border-left: 4px solid#1485d6
}
</style>
    
@endsection
@section('content')

<div id="layoutSidenav_content">
 
    <div class="container border">
      <div id="taskStatus"></div>
         {{-- status messages --}}
        @include('statusmessage')
        <div class="row text-center">
            <div class="col-md-8 col-xs-12">
                <h4>{{ucwords($module->module_name)}}</h4>
                  <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createTask">Add Task</button>
            </div>
        </div>
    </div>
    {{-- your Tasks section --}}
        <div class="container">
            <h3 class="mt-4">Tasks under this Module</h3>
            @if ($count_tasks > 0)
            <div class="row">
            @foreach ($tasks as $task)
            
                 <div class="parenttask col-xl-3 col-md-6" id="{{$task->id}}">
                  <div class="card bg-light text-light mb-4">
                    <div class="card-header">
                      {{ucwords($task->task_name)}}
            
                        <i class="fas fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" ></i>
                
                      <div class="dropdown">
                        <div class="dropdown-menu">
                          <a class="dropdown-item" class="startTask" href="" id="{{$task->id}}">start</a>
                          <a class="dropdown-item" class="completeTask" href="/completeTask/{{$task->id}}">Mark as complete</a>
                          <a class="dropdown-item" href="#">Edit</a>
                          <a class="dropdown-item" href="/assign/{{$task->id}}">Assing members</a>
                          
                      
                         
                        </div>
                      </div>
                    </div>
                      <div class="card-body {{$task->status}}">
                      <p class="text-dark" >{{ucwords($task->status)}}</p>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-dark">Deadline: {{$task->deadline}}</span>
            
                          <div class="small text-dark">
                            <a href="/delete/{{$task->id}}" class="trash btn btn-danger btn-xs">Trash</a>                  
                            </div>
                        </div>
                  </div>
              </div> 
            @endforeach 
          </div>
            @else
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item">No Tasks</li>
          </ol>     
            @endif   
            
        </div>

 {{-- modal --}}
<div class="container">
  <div class="modal fade" id="createTask">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       <form action="/{{$module->id}}/create-task" method="post">
           @csrf
           <label for="title">Task Title</label>
           <input type="text" name='task_title' id="title" class="form-control">
      
          <label for="deadline">Deadline</label>
          <input type="datetime-local" class="form-control" name="deadline">

          <label for="deadline">Assign members</label>
          <input type="text" class="form-control" name="members">
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Add</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>
  
</div>
{{-- end of modal section --}}
</div>

    
@endsection





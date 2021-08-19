@extends('layouts.companydashboard')
@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4">{{ucwords($department->name)}}</h1>
        @include('statusmessage')
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-dark mb-4">
                    <div class="card-body"><a href="/">Projects</a></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">project count:</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Modules</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">Tasks</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <h4>Projects</h4>
            </div>
            <div class="col-6">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addproject">Create project</button>
            </div>
        </div>
     
        @if ($project_count > 0)
        @foreach ($projects as $project)
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/project/{{$project->id}}">{{$project->name}}</a>
                <span class='text-right'></span></li>
        </ol>
        @endforeach   
        @else
         <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        You have no projects yet, Create a project to work with,
                         you can add modules and tasks to your created project
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addproject">Create project</button>
                    </div>
                </div>    
            </div>
        </div> 
         @endif 
      
          
         </div> 
      
    </div>
                
</div>



{{-- modal --}}
<div class="container">
<div class="modal fade" id="addproject">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New project</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
     <form action="/{{$department->id}}/create-project" method="post">
         @csrf
         <label for="title">Project Title</label>
         <input type="text" name='project_title' id="title" class="form-control">
    
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>
      
    </div>
  </div>
</div>

</div>

  
</div>
    
@include('footer')
@endsection
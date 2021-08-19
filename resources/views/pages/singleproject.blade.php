@extends('layouts.companydashboard')
@section('content')
{{-- company dashboard --}}
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
          @include('statusmessage')
            <h3 class="mt-4">{{ucwords($project->name)}}</h3> 
        <div class="row">
          <h4 class="mt-4">Modules under this project</h4>
          <button class="btn btn-sm btn-success" data-toggle="modal"data-target='#createTask'>Add new module</button>
        </div>
        
           @if ($count_modules>0)
           <div class="row">
           @foreach ($modules as $module)
           <h6> <a href="/{{$module->id}}/tasks">{{$module->module_name}}</a></h6>
            @endforeach
           
            @else 
              <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">No modules to show</li>
            </ol>
            @endif     
          </div>
        </div>
        {{-- create module section --}}
      
    </main>
    @include('footer')
   
</div>
<div class="container">
  <div class="modal fade" id="createTask">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Module</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       <form action="/{{$project->id}}/create-module" method="post">
           @csrf
           <label for="title">Module Title</label>
           <input type="text" name='module_title' id="title" class="form-control">
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
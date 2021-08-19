 @extends('layouts.companydashboard')
 @section('css')
 <style>
     
    .fa-plus{
        float: right;
    }
 </style>
     
 @endsection
@section('content')
{{-- company dashboard --}}
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            @include('statusmessage')
            <h1 class="mt-4">{{ucwords($company->name)}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-dark mb-4">
                        <div class="card-body"><a href="/" style="color: black">Departments</a></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">project count:</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Projects</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
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
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-dark mb-4">
                        <div class="card-body">
                            <a href="/company/{{$company->id}}/members">Members</a>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">project count:</a> --}}
                            
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
    
          
        </div>
        {{-- create department section --}}
        <div class="row mt-4">
            <div class="col-md-8 col-xs-12">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item ">Create a department</li>
                </ol>
                <form action="/{{$company->id}}/createdept" method="post">
                  @csrf
                   <div class="form-group">
                       <div class="form-group-item">
                           <label for="department">Title</label>
                        <input type="text" name="title" id="department" class="form-control">
                       @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                         @enderror
                       </div>     
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-info">Create</button>
                   </div>
               </form>
                   
            </div>
        </div>
        <div class="container-fluid">
            <h3 class="mt-4">Your Departments</h3>
             @if ($count_departments>0)
            @foreach ($alldepartments as $alldepartment)
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/department/{{$alldepartment->id}}">{{$alldepartment->name}}</a></li>
            </ol>
            @endforeach
            @else 
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">No Departments to show</li>
            </ol>     
            @endif
           
        </div>
    </main>
    @include('footer')
   
</div>
</div>


    @endsection 
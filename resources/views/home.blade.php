@extends('layouts.adminDashboard')
@section('content')
<div id="layoutSidenav_content">
    {{-- header and welcome message --}}

    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('success') }}
    </div>
@endif
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Gooday!! {{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
          </li>
        <li>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add company</button>
        </li>
        </ol>
        
        <div class="row mt-4">
            <div class="col-md-3 col-sm-4 col-xs-3">Company name</div>
            <div class="col-md-3 col-sm-2 col-xs-3">Departments</div>
            <div class="col-md-2 col-sm-2 col-xs-2">Projects</div>
            <div class="col-md-2 col-sm-2 col-xs-2">members</div>
            <div class="col-md-2 col-sm-2 col-xs-2">setting</div>
        </div>
        <div class="row">
            {{$companies}}
        </div>
    </div>

  
    
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form action="/createCompany" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <div class="form-group-item">
                    <label for="title">Company name:</label>
                    <input type="text" class="form-control" id="title" name="name">
                  </div>      
              </div>
              <div class="form-group">
                <div class="form-group-item">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                  </div>
              </div>
              <div class="form-group">
                <div class="form-group-item">
                    <label for="logo">Company Logo</label>
                    <input type="file" class="form-control" id="logo" name="image">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create</button>
              </div>
          </form>
        </div>
     
      </div>
  
    </div>
  </div>
      
    
@endsection
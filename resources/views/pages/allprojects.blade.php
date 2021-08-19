@extends('layouts.companydashboard')
@section('css')
    
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <h1>Projects</h1>
            @foreach ($total as $project)
                {{$project}}
            @endforeach
        </div>
    </main>
</div>



</div>    
@endsection
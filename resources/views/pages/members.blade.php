@extends('layouts.companydashboard')
@section('css')
    <style>
#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
    }

.frontside,


.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
.addmember{
    float: right;
}

@media (max-width: 576px) {
    .section-title{
        font-size: 6vw;
    }
}

@media (min-width: 576px && max-width:768px) {

}

@media (max-width: 992px) {
    .section-title{
        font-size: 4vw;
    }
}
    </style>
@endsection
@section('content')
<div id="layoutSidenav_content">
    <main>
        <section id="team" class="pb-5">
            <div class="container">
                @include('statusmessage')
                    <h5 class="section-title h1">Members       
                    </h5>
                    <div class="dropdown"> 
                        <a href="" class="addmember btn btn-primary btn-sm"  data-toggle="dropdown" >
                            <i class="fa fa-user-plus"></i>Add new</a>
                                <div class="dropdown-menu text-center">
                                   <h6>Invite Member to company</h6><hr>
                                    <div class="dropdown-item">
                                        <form action="/company/{{$company->id}}/invite" method="post" id="invite_member_form">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-group-item">
                                                    <input type="search" id="invite_email" placeholder="Enter email address" class="form-control" name="email_invite" autocomplete="off">
                                                </div>
                                                
                                            </div>
                                            <button id="send_invite" type="submit" class="btn btn-success btn-sm" disabled>Send Invitation</button> 
                                        </form>
                                        

                                    </div>
                                 
                                  
                                </div>
                    </div>
            {{-- dropdown for add members --}}
          
            </div>     
        
            {{-- end of dropdown --}}
               
                <div class="row">
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                                            <h4 class="card-title">ozoemena Jude</h4>
                                            <p class="card-text">Role: Admin</p>
                                            <a href="" class="btn btn-primary btn-sm">Remove</a>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_03.png" alt="card image"></p>
                                            <h4 class="card-title">Gabby Cruise</h4>
                                            <p class="card-text">Role: Node js developer</p>
                                            <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_06.jpg" alt="card image"></p>
                                            <h4 class="card-title">Adole samuel Sani</h4>
                                            <p class="card-text">Role: Senior Flutter Developer</p>
                                            <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- ./Team member -->
        
                </div>
            </div>
        </section>
    </main>
</div>

{{-- dont delete this div smiles --}}
</div>
    
@endsection
@section('scripts')
<script>
    // valid email address
$( document ).ready(function() {
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

// enable button if email is valid
  $('#invite_email').on('keyup', function(){
     var email = $(this).val();
     if(isValidEmailAddress(email)){
         $('#send_invite').prop('disabled', false);
     }else{
       $('#send_invite').prop('disabled', true);
     }
  });
//  invite the user
//     var form = $('#invite_member_form');
//         form.submit( function(e){
//             $.ajax({
//                 method: 'POST',
//                 url: form.attr('action')
//             }) 

//          return false;
    // })
     
  });





</script>
    
@endsection
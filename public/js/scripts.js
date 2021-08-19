(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
    // add members
    $('.fa-plus').on('click', function(){
        console.log('modal');
    })

     // delete task
     $('.trash').each(function(){
        $(this).on('click', function(e){
            e.preventDefault();
            var task = $(this).parents('div.parenttask').attr('id')
        
    
        $.ajax({
                method : 'GET',
                url: '/delete/'+task,
                success: function(data){
                    var result = `<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    `+data['success']+`
                    </div>`
                    $('#taskStatus').html(result);
                 
                },
                error : function(data){
                    var result = `<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    `+data.statusText+`
                    </div>`
                    $('#taskStatus').html(result);
                }
            })
            $(this).parents('div.parenttask').remove();
        })
    });

    // start Task
  
    $('.startTask').each(function(){
        $(this).on('click', function(e){
            console.log('click');
            e.preventDefault();
            var href = $(this).attr('href');
    
    $.ajax({
        method: 'GET',
        url: href,
        error: function(data){
            let result = `<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            `+data.responseJSON.error+`
            </div>`
            $('#taskStatus').html(result);
        },
        success: function(data){
            let result = `<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            `+data['success']+`
            </div>`
            $('#taskStatus').html(result);
            }
        })
    })
})
    // complete Task
    $('.completeTask').each(function(){
        on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            console.log(href)
            $.ajax({
                method : 'GET',
                url: href,
                error: function(data){
                    console.log(data.responseJSON);
                    let result = `<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    `+data.responseJSON.error+`
                    </div>`
                    $('#taskStatus').html(result);
                },
                success: function(data){
                    let result = `<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    `+data['success']+`
                    </div>`
                    $('#taskStatus').html(result);
                }
            })
    })
    });
// invite members


})(jQuery);

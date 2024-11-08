$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $("#old_password").keyup(function(){
        var old_password = $("#old_password").val();
        $.ajax({
            type: 'post',
            url: '/admin/check-current-password',
            data: {old_password:old_password},
            success:function(resp){
                if(resp==false){
                    $('#check_password').html("<font color='red'>Current Password is Incorrect!</font>");
                    console.log(resp);
                }else if(resp==true){
                    $('#check_password').html("<font color='green'>Current Password is correct!</font>");
                    console.log(resp);
                }
            },error:function(){
                alert('Error')
            }
        });
    });
});

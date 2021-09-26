$(document).ready(function () {
    //check admin password is correct
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'post',
            url: '/admin/update-password',
            data:{current_pwd:current_pwd},
            success:function(resp) {
                if(resp=="true"){
                    $("#show_msg").html("<span style='color: green'>Your password is incorrect</span>");
                }
                else{
                    $("#show_msg").html("<span style='color: red'>Your password is incorrect</span>");
                }
            },
            error:function () {
                alert("Error");
            }
        });
    });
    //category level
    $("#section_id").change(function () {
        var section_id = $(this).val();
         // alert(section_id);
        $.ajax({
            type: 'post',
            url: '/admin/append-categories-level',
            data:{section_id:section_id},
            success:function(resp) {
                // alert(resp);
               $("#categoryLevel").html(resp);
            },
            error:function () {
                alert("Error");
            }
        });

    });
});

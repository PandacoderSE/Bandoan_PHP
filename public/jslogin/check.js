$(document).ready(function(){
    $("#fullname").keyup(function(){
        var user = $(this).val();
        $.post("./Ajax/checkun",{un:user}, function(data){
            $("#messageUn").html(data);
        });
    });

});
$(function(){


    $("#picture").change(function(e){
        var file = $("#picture")[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);

        reader.addEventListener("load", function(){
            $("#profile-picture-holder").prop('src', reader.result);
        })
    });

});
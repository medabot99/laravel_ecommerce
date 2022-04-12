$(function() {

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    if ($("#error-alert").length > 0){
        var errorMessage = "";

        $.each($("#error-alert").data('val'), function(i, v){
            errorMessage += v + "\n";
        });

        Toast.fire({
            icon: 'error',
            title: errorMessage
        });
    }

    if ($("#success-alert").length > 0){

        var successMessage = "";

        $.each($("#success-alert").data('val'), function(i, v){
            successMessage += v + "\n";
        });
        
        Toast.fire({
            icon: 'success',
            title: successMessage
        });
    }

    

   

    
});
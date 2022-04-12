$(function(){

    if($("#dark-mode-switch").length > 0){
        darkModeSwitchUpdate($("#dark-mode-switch").is(":checked"));
    }

    $("#dark-mode-switch").change(function(){

        $("#sidebar-body").removeClass('sidebar-' + $("#theme").val() + '-' + $("#sidebarColor").val());

        darkModeSwitchUpdate(this.checked);

        $("#sidebar-body").addClass('sidebar-' + $("#theme").val() + '-' + $("#sidebarColor").val());
    });

    $('#navbar-color-chooser > li > a').click(function (e) {

        e.preventDefault()

        setNavbarColorUpdate($("#navbarColor").val(), $(this).data('val'));
        
    });

    $('#sidebar-color-chooser > li > a').click(function (e) {

        e.preventDefault()

        setSidebarColorUpdate($("#theme").val(), $("#sidebarColor").val(), $(this).data('val'));
        
    });

    $('#card-color-chooser > li > a').click(function (e) {

        e.preventDefault()

        setCardColorUpdate($("#cardColor").val(), $(this).data('val'));
        
    });

});

function darkModeSwitchUpdate(darkMode){



    if(darkMode){
        $("#theme").val('dark');
        $("#theme-body").addClass("dark-mode");
    }else{
        $("#theme").val("light");
        $("#theme-body").removeClass("dark-mode");
    }

}

function setNavbarColorUpdate(curColor, newColor){

    $("#navbar-body").removeClass('navbar-'+curColor).addClass('navbar-'+newColor);
    $("#navbarColor").val(newColor)
}

function setSidebarColorUpdate(theme, curColor, newColor){

    $("#sidebar-body").removeClass('sidebar-' + theme + '-' + curColor).addClass('sidebar-' + theme + '-' + newColor);
    $("#sidebarColor").val(newColor)
}

function setCardColorUpdate(curColor, newColor){

    $("#card-body").removeClass('card-' + curColor).addClass('card-' + newColor);
    $("#cardColor").val(newColor)
}
$(document).ready(function () {
    /**
     * Hide side bar menu and display button
     */
    $('#sidebarHidden').on('click', function () {
        $('#sidebarMenu').fadeOut('fast', function () {
            $('#sidebarDisplay').toggle('fast');
        });
    });

    /**
     * Hide button and display side bar menu
     */
    $('#sidebarDisplay').on('click', function () {
       $('#sidebarDisplay').toggle('fast', function () {
           $('#sidebarMenu').fadeIn('fast');
       });
    });
});


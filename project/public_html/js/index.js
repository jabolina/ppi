function toggleSidebar(action) {
    /*action === 'hide' ?
        $('#sidebarMenu').fadeOut('fast', function () {
            sessionStorage.setItem('sidebar', 'hide');
            $('#sidebarDisplay').toggle('fast');
        })

        :

        $('#sidebarDisplay').toggle('fast', function () {
            sessionStorage.setItem('sidebar', 'show');
            $('#sidebarDisplay').fadeOut('fast');
            $('#sidebarMenu').fadeIn('fast');
        });*/
}

$(document).ready(function () {

    /**
     * Verify side bar previous state and set it on page reload
     */
    (function () {
        sessionStorage.getItem('sidebar') ?
            toggleSidebar(sessionStorage.getItem('sidebar')) : null;
    })();
});


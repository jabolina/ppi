function displayLoginStatus(message) {
    const alertElement = $("#login-status-alert");
    alertElement.innerText = message;

    debugger;

    alertElement
        .fadeIn()
        .delay(250)
        .fadeOut();
}
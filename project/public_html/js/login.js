function displayLoginStatus(message) {
    const alertElement = $("#login-status-alert");
    alertElement.innerText = message;

    alertElement
        .fadeIn()
        .delay(250)
        .fadeOut();
}
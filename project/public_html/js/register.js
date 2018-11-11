function displaySpecialty(checkbox) {
    if (checkbox.checked) {
        $('#doctorSpecialty').fadeIn(500);
    } else {
        $('#doctorSpecialty').fadeOut(500);
    }
}

function verifyBirthday(evt) {
    const birthDay = new Date(evt);
    const today = new Date();

    if ((today - birthDay) < 0) {
        displayAlertAndDisableButton("Data de nascimento não pode ser utilizada");
    } else {
        hideAlertAndEnableButton();
    }
}

function hideAlertAndEnableButton() {
    $("#register-employee-btn").prop("disabled", false);
    $("#register-status-alert")
        .fadeOut();
}

function displayAlertAndDisableButton(message) {
    $("#register-employee-btn").prop("disabled", true);
    $("#register-status-alert")
        .text(message)
        .fadeIn();
}

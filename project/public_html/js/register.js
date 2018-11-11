function displaySpecialty(checkbox) {
    if (checkbox.checked && checkbox.id === "medic") {
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

$(document).ready(function () {
    document
        .querySelector('#employee-role')
        .querySelectorAll('input')
        .forEach(input => input.addEventListener('change', function() {

            displaySpecialty(this);

            document
                .querySelector('#employee-role')
                .querySelectorAll('input')
                .forEach(input => input.setAttribute('checked', false));
    }));

    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
});

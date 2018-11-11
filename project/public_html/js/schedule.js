function listDoctors(spec) {
    if (spec !== "-1") {
        $.ajax({
            url: `${window.location.origin}/request.php?template=schedule/list-doctors.php&content=false&spec=${spec}`,
            type: "GET",
            async: true,
            dataType: "json",
            complete: function (res) {
                const body = JSON.parse(res.responseText);

                body.forEach(dr =>
                    $("#dr-select")
                        .append(`<option value="${dr.id}" name="dr[]">${dr.name}</option>`)
                );
            },
            error: function () {
                console.log("error");
            }
        });
    }
}

function verifyDate (date) {
    const scheduleDate = new Date(date);
    const today = new Date();

    if ((today - scheduleDate) > 0) {
        displayAlertAndDisableButton("Data para agendamento nao permitida");
    } else {
        hideAlertAndEnableButton();
    }
}

function hideAlertAndEnableButton() {
    $("#schedule-submit-btn").prop("disabled", false);
    $("#schedule-status-alert")
        .fadeOut();
}

function displayAlertAndDisableButton(message) {
    $("#schedule-submit-btn").prop("disabled", true);
    $("#schedule-status-alert")
        .text(message)
        .fadeIn();
}

$(document).ready(function () {
    (() => {
        $.ajax({
            url: `${window.location.origin}/request.php?template=schedule/list-specialty.php&content=false`,
            type: 'GET',
            async: true,
            dataType: 'json',
            complete: function (res) {
                if (res.readyState === 4) {
                    const body = JSON.parse(res.responseText);

                    body.forEach(specialty =>
                        $("#spec-select")
                            .append(`<option value="${specialty}" name="spec[]">${specialty}</option>`)
                    );
                }
            },
            error: function () {
                console.log('error');
            }
        });
    })();
});

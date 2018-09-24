function displaySpecialty(checkbox) {
    if (checkbox.checked) {
        $('#doctorSpecialty').fadeIn(500);
    } else {
        $('#doctorSpecialty').fadeOut(500);
    }
}
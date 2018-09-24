$(document).ready(() => {
    $(".img-gallery").each(function(index) {
        $(this).delay(500 * index).fadeIn();
    });
});

function imageAddBorder(img) {
    img.style.border = '1px solid red';
}

function imageRemoveBorder(img) {
    img.style.border = '0';
}

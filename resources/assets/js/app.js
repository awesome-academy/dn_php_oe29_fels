require('./bootstrap');

$(document).on('click', '#logout', function (event) {
    event.preventDefault();
    $.ajax({
        url: '/logout',
        type: 'POST',
        data: {
            '_token': $(this).attr('data-csrf'),
        },
        success: function (res) {
            location.reload();
        }
    });
});

$('.dropdown-btn').on('click', function () {
    $(this).toggleClass("active");
    var dropdownContent = $(this).next();
    if (dropdownContent.css('display') === "block") {
        dropdownContent.css('display', 'none');
    } else {
        dropdownContent.css('display', 'block');
    }
});

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

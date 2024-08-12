document.addEventListener("DOMContentLoaded", function () {
    var detailButtons = document.querySelectorAll('.btn-details');
    var bookButtons = document.querySelectorAll('.btn-book');

    detailButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var roomId = button.getAttribute('data-room-id');
            window.location.href = 'room_details.php?room_id=' + roomId;
        });
    });

    bookButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var roomId = button.getAttribute('data-room-id');
            window.location.href = 'booking.php?room_id=' + roomId;
        });
    });

    $('.btn-details').on('click', function () {
        var roomId = $(this).data('room-id');
        window.location.href = 'room_details.php?room_id=' + roomId;
    });

    $('.btn-book').on('click', function () {
        var roomId = $(this).data('room-id');
        window.location.href = 'booking.php?room_id=' + roomId;
    });
});

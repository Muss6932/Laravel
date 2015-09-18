$(document).ready(function () {

    setInterval(function () {
        console.log('Ready for next..');

        //appel ajax
        $.ajax({
            url: $('#panelajax').attr('data-url')
        }).done(function (data) {
            $('#dashboard-recent').html(data);
        });

    }, 3000);


});

//# sourceMappingURL=realtime.js.map
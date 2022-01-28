//پنل مدیریت
$(document).ready(function () {
    $('.admin-menu > ul > li.category').click(function () {
        $("ul.sub-category").slideToggle();
    });
    $('.admin-menu > ul > li.product').click(function () {
        $("ul.sub-product").slideToggle();
    });
    $('.admin-menu > ul > li.order').click(function () {
        $("ul.sub-order").slideToggle();
    });
});
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 1,
            nav: true
        },
        1000: {
            items: 1,
            nav: true,
            loop: true
        }
    },
    navText: Array('<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'),
    dots: true,
    autoplay: true,
});

function getuserroute(user_id) {
    var _token = $("input[name='_token']").val();
    $.post("getroutes", { id: user_id, _token: _token }, function (data) {
        let options = "";
        for (let i = 0; i < data.length; i++) {
            options += "<option>" + data[i]['address'] + "</option>";
        }
        $("#address").html(options);
        $("#routeModal").modal();
    });
}

function timer(time, start_time) {
    var interval = setInterval(function () {
        var d = new Date();
        var current_timestamp = d.getTime();
        var hour_in_milliseconds = time * 60 * 1000;
        var time_left = hour_in_milliseconds - (current_timestamp - (start_time * 1000));
        if (time_left > 0) {
            document.getElementById("response").innerHTML = msToTime(time_left);
        } else {
            document.getElementById("response").innerHTML = "00:00:00"
            clearInterval(interval);
        }
    }, 1000);

}

function msToTime(s) {

    // Pad to 2 or 3 digits, default is 2
    function pad(n, z) {
        z = z || 2;
        return ('00' + n).slice(-z);
    }

    var ms = s % 1000;
    s = (s - ms) / 1000;
    var secs = s % 60;
    s = (s - secs) / 60;
    var mins = s % 60;
    var hrs = (s - mins) / 60;

    return pad(hrs) + ':' + pad(mins) + ':' + pad(secs);
}




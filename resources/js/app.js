$(function () {
    $('.small-box').on('click', function () {
        var urlStart = $(this).attr('urlStart'),
            name = $(this).find('h3.name').text(),
            timeStart = $(this).find('.inner p').attr('time-start');
        if ($(this).hasClass("bg-yellow")) {
            $.confirm({
                title: 'Xác nhận',
                content: 'Bắt đầu tính giờ?',
                buttons: {
                    OK: function () {
                        window.location.href = urlStart;
                    },
                    Thoát: function () {
                    }
                }
            });
        }else if('bg-aqua'){
            $.confirm({
                title: name,
                closeIcon:true,
                boxWidth: '30%',
                useBootstrap: false,
                onOpen: function(){
                    var id = $('#countup');
                    // Month Day, Year Hour:Minute:Second, id-of-element-container
                    countUpFromTime(timeStart, id); // ****** Change this line!
                },
                content: '<div class="form-group">' +
                    '<p id="countup">Đang chơi: ' +
                    '<span class="timeel hours">00</span>\n' +
                    '<span class="timeel timeRefHours">Giờ</span>\n' +
                    '<span class="timeel minutes">00</span>\n' +
                    '<span class="timeel timeRefMinutes">Phút</span>\n' +
                    // '<span class="timeel seconds">00</span>\n' +
                    // '<span class="timeel timeRefSeconds">seconds</span></p>'+
                    '</div>' ,

                buttons: {
                    'Gọi Thêm': function () {
                        $.dialog({
                            title: 'Asynchronous content',
                            content: 'url:http://localhost/bida/public/',
                            animation: 'scale',
                            columnClass: 'medium',
                            closeAnimation: 'scale',
                            backgroundDismiss: true,
                        });
                    },
                    'Tính Tiền': function () {
                        alert(2);
                    },
                    'Chuyển bàn': function () {
                        alert(3);
                    },
                    Thoát: function () {
                        alert(3);
                    }
                }

            });
        }
    });


    function countUpFromTime(countFrom, elment) {
        countFrom = new Date(countFrom).getTime();
        var now = new Date(),
            countFrom = new Date(countFrom),
            timeDifference = (now - countFrom);

        var secondsInADay = 60 * 60 * 1000 * 24,
            secondsInAHour = 60 * 60 * 1000;

        days = Math.floor(timeDifference / (secondsInADay) * 1);
        hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
        mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
        secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

        elment.find('.hours').text(days * 24 + hours);
        elment.find('.minutes').text(mins);
        // elment.find('.seconds').text(secs);

        clearTimeout(countUpFromTime.interval);
        countUpFromTime.interval = setTimeout(function () {
            countUpFromTime(countFrom, elment);
        }, 1000);
    }

});

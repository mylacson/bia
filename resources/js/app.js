$(function () {
    $('.small-box').on('click', function () {
        var url = $(this).attr('url'),
            name = $(this).find('h3.name').text();
        if ($(this).hasClass("bg-yellow")) {
            $.confirm({
                title: 'Xác nhận',
                content: 'Bắt đầu tính giờ?',
                buttons: {
                    OK: function () {
                        window.location.href = url;
                    },
                    Thoát: function () {
                    }
                }
            });
        }else if('bg-aqua'){
            $.confirm({
                title: name,
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label>Enter something here</label>' +
                    '<input type="text" placeholder="Your name" class="name form-control" required />' +
                    '</div>' +
                    '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Submit',
                        btnClass: 'btn-blue',
                        action: function () {
                            var name = this.$content.find('.name').val();
                            if(!name){
                                $.alert('provide a valid name');
                                return false;
                            }
                            $.alert('Your name is ' + name);
                        }
                    },
                    cancel: function () {
                        //close
                    },
                },
                onContentReady: function () {
                    // bind to events
                    var jc = this;
                    this.$content.find('form').on('submit', function (e) {
                        // if the user submits the form by pressing enter in the field.
                        e.preventDefault();
                        jc.$$formSubmit.trigger('click'); // reference the button and click it
                    });
                }
            });
        }
    });

});

// count up clock
window.onload = function () {
    var id = $('#countup6'),
    timeStart = id.attr('time-start');
    // Month Day, Year Hour:Minute:Second, id-of-element-container
    countUpFromTime(timeStart, id); // ****** Change this line!
};

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
    elment.find('.seconds').text(secs);

    clearTimeout(countUpFromTime.interval);
    countUpFromTime.interval = setTimeout(function () {
        countUpFromTime(countFrom, elment);
    }, 1000);
}
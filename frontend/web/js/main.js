
$( document ).ready(function() {

    $.datetimepicker.setLocale(document.documentElement.lang);
    var dates_to_disable = ['13-07-2017','12-07-2017','11-08-2017'];
    var input_start = $('#some_class_1');
    var input_end = $('#some_class_2');
    var guest_price = parseInt($('#guest_price').text().slice(0, -1));

    $('.timepicker').datetimepicker({
        format: 'd.m.Y',
        timepicker: false,
        formatDate: 'd-m-Y',
        todayButton: "true",
        minDate: '01-01--1970',
        disabledDates: dates_to_disable
    });

    $('.timepicker').change(function(){
        $('.timepicker').datetimepicker({
            onSelectDate: function () {
                var date_start = moment($('#some_class_1').val(), 'DD.MM.YYYY');
                var date_end = moment($('#some_class_2').val(), 'DD.MM.YYYY');
                var lang = document.documentElement.lang;
                var id = $.urlParam('id');
                var days = Math.ceil((date_end - date_start) / (1000 * 60 * 60 * 24));
                if(date_start != '' && date_end != ''){
                    if(Math.sign(days) != -1){
                        if(days >=0 && days < 5){
                            if(days == 0){
                                days = 1;
                            }
                            input_start.removeClass('invalid_field');
                            input_end.removeClass('invalid_field');
                            guest_count = $( "#guest_count option:selected" ).val();
                            price = $('#price_per_day').text();
                            total_price = days * parseFloat(price.slice(0, -1));
                            result_price = total_price + parseFloat($('#service_charge').text().slice(0, -1));
                            $('#multiplication').html(price +' x '+ days + ' суток');
                            $('#multiplication_price').html(total_price + ' ₴');
                            $('#result_price').html((guest_count * guest_price) + result_price + ' ₴');
                        }else if(days >=5 && days < 10){
                            input_start.removeClass('invalid_field');
                            input_end.removeClass('invalid_field');
                            price = $('#price_per_5_day').text();
                            total_price = days * parseFloat(price.slice(0, -1));
                            result_price = total_price + parseFloat($('#service_charge').text().slice(0, -1));
                            $('#multiplication').html(price +' x '+ days + ' суток');
                            $('#multiplication_price').html(total_price + ' ₴');
                            $('#result_price').html((guest_count * guest_price) + result_price + ' ₴');
                        }else if(days >= 10){
                            input_start.removeClass('invalid_field');
                            input_end.removeClass('invalid_field');
                            price = $('#price_per_10_day').text();
                            total_price = days * parseFloat(price.slice(0, -1));
                            result_price = total_price + parseFloat($('#service_charge').text().slice(0, -1));
                            $('#multiplication').html(price +' x '+ days + ' суток');
                            $('#multiplication_price').html(total_price + ' ₴');
                            $('#result_price').html((guest_count * guest_price) + result_price + ' ₴');
                        }
                    } else {
                        input_start.addClass('invalid_field');
                        input_end.addClass('invalid_field');
                        $('#multiplication').empty();
                        $('#multiplication_price').empty();
                        $('#result_price').empty();
                    }
                }
            },
            format: 'd.m.Y',
            timepicker: false,
            formatDate: 'd-m-Y',
            todayButton: "true",
            closeOnDateSelect: true,
            minDate: '01-01--1970',
            disabledDates: dates_to_disable
        });
    });

    $('#guest_count').change(function() {
        guest_count = $( "#guest_count option:selected" ).val();
        if($('#result_price').text() != ''){
            $('#result_price').html(result_price + (guest_count * guest_price) + ' ₴');
        } else {
            $('#result_price').empty();
        }
    });

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
            return null;
        }
        else{
            return decodeURI(results[1]) || 0;
        }
    };

    $(".set > a").on("click", function(){
        if($(this).hasClass('active')){
            $(this).removeClass("active");

            $(this).find('img').each( function(){
                var currentSrc = this.src;
                this.src = this.getAttribute('data-src');
            });

            $(".set > a img").find('img').each( function(){
                var currentSrc = this.src;
                this.src = this.getAttribute('data-src');
            });

            $(this).siblings('.content').slideUp(200);
            $(".set > a i").removeClass("filter-minus").addClass("filter-plus");
        }else{
            $(".set > a i").removeClass("filter-minus").addClass("filter-plus");
            $(this).find("i").removeClass("filter-plus").addClass("filter-minus");
            $(".set > a").removeClass("active");

            $(".set > a img").each( function(){
                var currentSrc = this.src;
                this.src = this.getAttribute('data-src');
            });

            $(this).addClass("active");

            $(this).find('img').each( function(){
                var currentSrc = this.src;
                this.src = this.getAttribute('data-hover');
            });

            $('.content').slideUp(200);
            $(this).siblings('.content').slideDown(200);
        }
    });
});
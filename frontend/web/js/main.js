
$( document ).ready(function() {

    $.datetimepicker.setLocale(document.documentElement.lang);
    var dates_to_disable = ['13-07-2017','12-07-2017','11-08-2017'];

    $('.timepicker').datetimepicker({
        format: 'd.m.Y',
        timepicker: false,
        formatDate: 'd-m-Y',
        todayButton: "true",
        minDate: '01-01--1970',
        disabledDates: dates_to_disable,
    });

    $('.timepicker').change(function(){
        $('.timepicker').datetimepicker({
            format: 'd.m.Y',
            timepicker: false,
            formatDate: 'd-m-Y',
            todayButton: "true",
            minDate: '01-01--1970',
            disabledDates: dates_to_disable,
            onSelectDate: function () {
                var date_2 = $('#some_class_2').val();
                var lang = document.documentElement.lang;
                var id = $.urlParam('id');
                $.ajax({
                    url: '/'+lang+'/site/get-price',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id,
                        date_2: date_2
                    },
                    success: function( data ) {
                        var price_2_hours = data['price_2'];
                        var price_night = data['price_night'];
                        var price_day = data['price_day'];
                        var price_5 = data['price_5'];
                        var price_10 = data['price_10'];
                    },
                    error: function ( exception ) {
                        alert(JSON.stringify( exception ));
                    }
                });
            }
        });
    });

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
            return null;
        }
        else{
            return decodeURI(results[1]) || 0;
        }
    }

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
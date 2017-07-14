
$( document ).ready(function() {

    $.datetimepicker.setLocale(document.documentElement.lang);
    var dates_to_disable = ['13-07-2017','12-07-2017','11-08-2017'];

    $('.timepicker').datetimepicker({
        lang: "ru",
        timepicker: false,
        formatDate: 'd-m-Y',
        todayButton: "true",
        minDate: '01-01--1970',
        disabledDates: dates_to_disable
    });

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
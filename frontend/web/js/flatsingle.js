
(function($, undefine) {
    $(document).ready(function() {

        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {

            }
        });

    });

     $('.flat_stars').raty({
         readOnly : true,
         hints: ['', '', '', '', ''],
         noRatedMsg: '',
         score: function() {
             return $(this).attr('data-score');
         }
     });

    $.datetimepicker.setLocale('ru');
    $('.timepicker').datetimepicker();

    textLimit = 336;

    $('.feedback_block').each( function() {

        if ($(this).find('.overflow_test').text().length >= textLimit) {
            // console.log('limit');
            $(this).find('.people_readmore_feedback').addClass("button_displayed");
        }



    });



})(jQuery);




(function($, undefine) {
    $(document).ready(function() {

        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {

            }
        });

    });


     $('.flat_stars').raty({
         score: function() {
             return $(this).attr('data-score');
         }
     });

    $.datetimepicker.setLocale('ru');
    $('.timepicker').datetimepicker();


    // $(this).find('img').each( function(){
    //     var currentSrc = this.src;
    //     //  console.log('currentsrc ' + currentSrc);
    //     this.src = this.getAttribute('data-src');
    // });

    // c= querySelectorAll('article').text().length;
    // console.log (c);

    textLimit = 336;

    $('.feedback_block').each( function() {

        // q= $(this).text().length;
        // console.log(q);
        // console.log('textlimit' + textLimit);

        if ($(this).find('.overflow_test').text().length >= textLimit) {
            // console.log('limit');
            $(this).find('.people_readmore_feedback').addClass("button_displayed");

            $('.feedback_block').find(".people_readmore_feedback").on("click", function(){

                event.stopPropagation();

                $(this).find('.feedback_text').addClass("auto_height");

                $(this).removeClass("button_displayed");
            });
        }



    });



})(jQuery);



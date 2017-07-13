//-------------google map

// var map;
// function initMap() {
//     map = new google.maps.Map(document.getElementById('map_single'), {
//         mapTypeId: google.maps.MapTypeId.ROADMAP,
//         center: {lat: 47.838917, lng: 35.130377},
//         zoom: 17,
//         scrollwheel: false,
//         zoomControl: true,
//         zoomControlOptions: {
//             position: google.maps.ControlPosition.TOP_RIGHT
//         },
//         scaleControl: true,
//         streetViewControl: true,
//         streetViewControlOptions: {
//             position: google.maps.ControlPosition.LEFT_TOP
//         },
//     });
//
//     //------------------ icon: ;
//
//     var marker = new google.maps.Marker({
//         position: {lat: 47.838917, lng: 35.130377},
//         map: map,
//         title: 'Розовый динозаврик!',
//         icon: 'img/marker.png',
//         label: {
//             text: '1450 ₴',
//             color: 'white',
//             fontWeight: '700',
//             fontSize: '18px',
//             fontFamily: 'Helvetica'
//         }
//     });
// };


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



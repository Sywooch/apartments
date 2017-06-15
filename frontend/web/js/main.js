
//------------accordeon-js

$(document).on('ready pjax:success', function(){
    
    // $(".set > a i").removeClass("filter-minus");

    $(".set > a").on("click", function(){

        if($(this).hasClass('active')){
            $(this).removeClass("active");

            $(this).find('img').each( function(){
                var currentSrc = this.src;
              //  console.log('currentsrc ' + currentSrc);
                this.src = this.getAttribute('data-src');
            });

            $(".set > a img").find('img').each( function(){
                var currentSrc = this.src;
               // console.log('currentsrc ' + currentSrc);
                this.src = this.getAttribute('data-src');
            });

            $(this).siblings('.content').slideUp(200);
            $(".set > a i").removeClass("filter-minus").addClass("filter-plus");

          //  console.log('accordeon is close');
        }else{
            $(".set > a i").removeClass("filter-minus").addClass("filter-plus");
            $(this).find("i").removeClass("filter-plus").addClass("filter-minus");
            $(".set > a").removeClass("active");

            $(".set > a img").each( function(){
                var currentSrc = this.src;
              //  console.log('currentsrc ' + currentSrc);
                this.src = this.getAttribute('data-src');
            });

            $(this).addClass("active");

            $(this).find('img').each( function(){
                var currentSrc = this.src;
            //    console.log('currentsrc ' + currentSrc);
                this.src = this.getAttribute('data-hover');
            });

            $('.content').slideUp(200);
            $(this).siblings('.content').slideDown(200);
           // console.log('accordeon is open');
        }
    });
});




  //----------Вписывание блока карты в оставшийся размер окна


// var history_map = document.querySelector('#map');
// var history_map_resize = function () {
//     var h = 0;
//     Array.prototype.forEach.call(history_map.parentNode.children, function (e) {
//         if (e !== history_map) h += e.getBoundingClientRect().height;
//     });
//     if (window.innerHeight > h) history_map.style.height = window.innerHeight - h -100 + 'px';
// };
// window.addEventListener('resize', history_map_resize, false);
// window.addEventListener('orientationchange', history_map_resize, false);
// history_map_resize();



//-------------google map


// var map;
// function initMap() {
//     map = new google.maps.Map(document.getElementById('map'), {
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
//         }
//     });
//
//    //------------------ icon: ;
//
//     var marker = new google.maps.Marker({
//         position: {lat: 47.840707, lng: 35.130763},
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
// }
//
// window.onload = function() {
//
//
//
//
//     // var debugWidth = Math.max(
//     //     document.body.scrollWidth, document.documentElement.scrollWidth,
//     //     document.body.offsetWidtht, document.documentElement.offsetWidth,
//     //     document.body.clientWidth, document.documentElement.clientWidth
//     // );
//     // var debugWidth =  window.innerWidth;
//     // // var debugWidth;
//     //     document.getElementById('debugblock').innerHTML = 'device_width=' + debugWidth;
//
//     var debugWidth =  window.innerWidth;
//     document.getElementById('debugblock').innerHTML = 'device_width=' + debugWidth;
//
//     window.onresize = function(event) {
//        var debugWidth =  window.innerWidth;
//         document.getElementById('debugblock').innerHTML = 'device_width=' + debugWidth;
//     };
// }





$("#filterbutton").on("click", function(){
    $(".sidebar").css(
        {'display': 'table', 'position': 'absolute', 'background': 'white', 'width': '300px', 'margin-top': '0'}
    );

    $("#filterbutton").css(
        {'display': 'none'}
    );

    $("#filter_close").css(
        {'display': 'block'}
    );
});

$("#filter_close").on("click", function(){
    $(".sidebar").css(
        {'display': 'none'}
    );

    $("#filterbutton").css(
        {'display': 'block'}
    );

    $("#filter_close").css(
        {'display': 'none'}
    );
});



// window.onload = function() {
//
//     var debugWidth =  window.innerWidth;
//     document.getElementById('debugblock').innerHTML = 'device_width=' + debugWidth;
//
//     window.onresize = function(event) {
//         var debugWidth =  window.innerWidth;
//         document.getElementById('debugblock').innerHTML = 'device_width=' + debugWidth;
//     };
// }

function sendRequest(){
    var lang = document.documentElement.lang;
    var form = $( "#search-filters" );
    var partialviewcontainer = $( "#a_list" );
    var search = form.serialize();
    $.ajax({
        url: '/'+lang+'/site/filters',
        dataType: 'html',
        type: 'GET',
        data: search,
        success: function( data ) {
            partialviewcontainer.html( data );
        },
        error: function ( exception ) {
            alert(JSON.stringify( exception ));
        }
    });
}

// $( document ).on('submit','form#contact-form',function(e){
//     e.preventDefault();
//     var lang = document.documentElement.lang;
//     var form = $( "#contact-form" );
//     var contact_form = form.serialize();
//     $.ajax({
//         url: '/'+lang+'/site/contact',
//         dataType: 'json',
//         type: 'POST',
//         data: contact_form,
//         success: function( data ) {
//             if(JSON.stringify( data ) == 1){
//                 form.trigger( "reset" );
//                 document.getElementById("contactform-verifycode-image").click();
//                 document.getElementById("success").click();
//             }
//         },
//         error: function ( exception ) {
//             alert(JSON.stringify( exception ));
//         }
//     });
// });

$( document ).on( 'submit','form#booking_form', function (e) {
    e.preventDefault();
    var lang = document.documentElement.lang;
    var date_start = $( '#some_class_1' ).val();
    var date_end = $( '#some_class_2' ).val();
    var guests_count = $( '#guest_count' ).val();
    var apartment_id = $.urlParam( 'id' );
    var user_id =  parseInt( $( '#hidden_user_input_id' ).val() );
    var total = parseInt( $( '#result_price' ).text().slice( 0, -1 ) );
        $.ajax({
            url: '/'+lang+'/site/booking',
            dataType: 'json',
            type: 'POST',
            data: {
                "apartment_id": apartment_id,
                "date_start": date_start,
                "date_end": date_end,
                "guests_count": guests_count,
                "total_price": total,
                "user_id": user_id
            },
            success: function( data ) {
                $( '#booking_form' ).trigger( "reset" );
                $( '#multiplication' ).empty();
                $( '#multiplication_price' ).empty();
                $( '#result_price' ).empty();
                if(data == 1){
                    document.getElementById( "success" ).click();
                }
            },
            error: function ( exception ) {
                if( JSON.stringify( exception['status'] == 403 ) ){
                    window.location.href = '/'+lang+'/site/login';
                }
            }
        });
});
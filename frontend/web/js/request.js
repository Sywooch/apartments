
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

$( document ).on('submit','form#contact-form',function(e){
    e.preventDefault();
    var lang = document.documentElement.lang;
    var form = $( "#contact-form" );
    var contact_form = form.serialize();
    $.ajax({
        url: '/'+lang+'/site/contact',
        dataType: 'json',
        type: 'POST',
        data: contact_form,
        success: function( data ) {
            if(JSON.stringify( data ) == 1){
                form.trigger( "reset" );
                document.getElementById("contactform-verifycode-image").click();
                document.getElementById("success").click();
            }
        },
        error: function ( exception ) {
            alert(JSON.stringify( exception ));
        }
    });
});
$( document ).ready( function() {
    var index = 0;
    var max = 3;
    var i = 0;
    var f_block = $( ".feedback_block" );

    f_block.each( function() {
        i += 1;
        if( i > max ) {
            $( this ).addClass( "hide_comment" );
        }
    });

    $( "#comments_show" ).click( function() {
        if( f_block.hasClass( 'hide_comment' ) ){
            f_block.each( function() {
                $( this ).removeClass( "hide_comment" );
            });
            $( "#comments_show" ).addClass( "hide_comment" );
            $( "#comments_hide" ).removeClass( "hide_comment" );
        }
    });

    $( "#comments_hide" ).click( function() {
        f_block.each( function() {
            if( index > 2 ){
                $( this ).addClass( "hide_comment" );
            }
            index += 1;
        });
        $( "#comments_hide" ).addClass( "hide_comment" );
        $( "#comments_show" ).removeClass( "hide_comment" );
        index = 0;
    });

    $( ".people_readmore_feedback" ).click( function() {
        $( '#count_' + this.id ).css({
            "max-height": "100%",
            "overflow-y": ""
        });
        $( '#' + this.id ).addClass( "hide_comment" );
    });
});

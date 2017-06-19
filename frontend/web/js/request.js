
function sendRequest(){
    // e.preventDefault();
    var lang = document.documentElement.lang;
    var form = $("#search-filters");
    var partialviewcontainer = $("#apartment-list");
    var search = form.serialize();
    
    $.ajax({
        url: '/'+lang+'/site/filters',
        dataType: 'html',
        type: 'GET',
        data: search,
        success: function(data) {
            partialviewcontainer.html(data);
        },
        error: function (exception) {
            alert(JSON.stringify(exception));
        }
    });

}

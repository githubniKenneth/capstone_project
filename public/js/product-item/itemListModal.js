// display a modal (small modal)
$(document).on('click', '#itemList', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    var buttonName = $(this).data('button-name');
    // console.log(buttonName);
    $.ajax({
        url: href
        , beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#itemListModal').modal("show");
            $('#buttonName').text(buttonName);
            // console.log(buttonName);
        }
        , complete: function() {
            $('#loader').hide();
        }
        , error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        }
        , timeout: 8000
    })
});
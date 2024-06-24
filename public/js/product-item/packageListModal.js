// display a modal (small modal)
$(document).on('click', '#packageList', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    var buttonName = $(this).data('button-name');
    $.ajax({
        url: href
        , beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#packageListModal').modal("show");
            $('#buttonName').text(buttonName);
            // $('#itemListBody').html(result).show();
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
$(document).ready(function() {
    $(document).on('click', '.removeItem', function() {
        var row = $(this).closest('tr');

            $(this).parents().eq(1).remove();

    });
});
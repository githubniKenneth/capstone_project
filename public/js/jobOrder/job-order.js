$(document).ready(function(){
    $('body').on('click', '.add-row', function (e){
        var trCount = $('.empRow').length;
        var html = $('#emp-row').html(); // cino-clone
        html = html.replace(/changeId/g, trCount);
        $('#emp-table').find('.technician-info').append('<div class="row my-2">'+html+'</div>');
    });

    
});

$(document).ready(function(){ // get employee details
    // var trCount = $('.empRow').length;
    $('body').on('change', '.empRow', function (e){
        var _self = $(this);
        var _row  = _self.closest('.row');

        $.ajax({
            type: "GET",
            url: _baseUrl + 'deployment/job-order/find-employee/' + _self.val(),
            success: function(response) {
                // console.log(response.data);
                _row.find('div:nth-child(2) input').val(response.data.emp_phone_no);
                _row.find('div:nth-child(3) input').val(response.data.branch.branch_name);
                // $( "input[id*='"+emp_id+"']").val( "09123456789" );
                // $( "input[id*='"+branch_id+"']").val( "Cavite" );
            },
            async: false
        });
        
    });
});

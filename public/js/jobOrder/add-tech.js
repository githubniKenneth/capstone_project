
    $(document).ready(function(){ // add employee row
        $('body').on('click', '.add-row', function (e){
            var trCount = $('.empRow').length;
            var html = $('#emp-row').html(); // cino-clone
            html = html.replace(/changeId/g, trCount);
            $('#emp-table').find('.technician-info').append('<div class="row my-2" id="tech-'+trCount+'">'+html+'</div>');
        });
    });
    
    $(document).ready(function(){ // get employee details
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
                },
                async: false
            });
            
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.removeTechnician', function() {
            $(this).parents().eq(1).remove();
        });
    });

    $(document).ready(function(){ // get employee details
        $('body').on('change', '#selectClient', function (e){
            var _self = $(this);
            $.ajax({
                type: "GET",
                url: _baseUrl + 'deployment/ocular/find-client/' + _self.val(),
                success: function(response) {
                    // console.log(response.data);
                    $('#client_address').val(response.data.client_full_address);
                    $('#clientEmail').val(response.data.client_email);
                    $('#clientName').val(response.data.client_full_name);
                    $('#clientContactNo').val(response.data.client_mobile_no);
                },
                async: false
            });
            
        });
    });
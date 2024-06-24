$(document).ready(function(){ // get employee details
    $('body').on('change', '#selectOrder', function (e){
        $('#itemDetailsTable tbody').empty();
        var _self = $(this);
        $.ajax({
            type: "GET",
            url: _baseUrl + 'sales/order/find-order-data/' + _self.val(),
            success: function(response) {
                // console.log(response.quotation.client_id);
                // response/ data passed from controller / relationship / column name

                order_data = response.order;
                
                order_details_data = response.orderDetails;
                // console.log(order_details_data);
                // // client details
                var payment_type = '';
                switch (order_data.payment_type) {
                case 1:
                    payment_type = 'Cash';
                    break;
                case 2:
                    payment_type = 'Online';
                    break;
                case 3:
                    payment_type = 'Check';
                    break;
                }

                $('#selectClient').val(order_data.client_id);
                $('#client_address').val(order_data.client.client_full_address);
                $('#clientEmail').val(order_data.client.client_email);
                $('#clientName').val(order_data.client.client_full_name);
                $('#clientContactNo').val(order_data.client.client_mobile_no);
                $('#prepared_by').val(order_data.employee.emp_full_name);
                $('#total_amount').val(order_data.order_total_amount);
                $('#payment_type').val(payment_type);
                

                // items
                var order_details = order_details_data.filter(function(detail) {
                    return detail.order_id === order_data.id;
                });
                var itemCounter = 0;
                order_details.forEach(function(data) {
                    itemCounter++;
                    if (data.is_package == 1 && data.item_id == 0){
                            // loop packages
                        $('tbody#orderedDetails').append(
                            '<tr id="'+ itemCounter +'">'+
                                '<td class="col-md-1">'+ itemCounter +'</td>'+
                                '<td class="col-md-4">'+data.package.pack_name+'</td>'+
                                '<td class="col-md-2">PACKAGE</td>'+
                                '<td class="col-md-2">'+data.order_qty+'</td>'+
                                '<td class="col-md-2">'+data.order_amount+'</td>'+
                                '<td class="col-md-2">'+data.order_total_amount+'</td>'+
                            '</tr>');
                    }
                    else if (data.item_id >= 1){
                        // loop items
                        $('tbody#orderedDetails').append( 
                            '<tr id="'+ itemCounter +'">'+
                                '<td class="col-md-1">'+ itemCounter +'</td>'+
                                '<td class="col-md-4">'+data.item.product_name+'</td>'+
                                '<td class="col-md-2">'+data.item.uom.uom_shortname+'</td>'+
                                '<td class="col-md-2">'+data.order_qty+'</td>'+
                                '<td class="col-md-2">'+data.order_amount+'</td>'+
                                '<td class="col-md-2">'+data.order_total_amount+'</td>'+
                            '</tr>');
                    }
                });
            },
            async: false
        });
    });
});
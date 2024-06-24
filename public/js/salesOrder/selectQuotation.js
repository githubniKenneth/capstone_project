$(document).ready(function(){ // get employee details
    $('body').on('change', '#selectQuotation', function (e){
        var _self = $(this);
        $.ajax({
            type: "GET",
            url: _baseUrl + 'sales/quotation/find-quotation-data/' + _self.val(),
            success: function(response) {
                // console.log(response.quotation.client_id);
                // response/ data passed from controller / relationship / column name

                quotation = response.quotation;
                // client details
                $('#selectClient').val(response.quotation.client_id);
                $('#client_address').val(response.quotation.client.client_full_address);
                $('#clientEmail').val(response.quotation.client.client_email);
                $('#clientName').val(response.quotation.client.client_full_name);
                $('#clientContactNo').val(response.quotation.client.client_mobile_no);
                $('#remarks').val(response.quotation.remarks);

                // payment information
                $('#material_cost').val(response.quotation.quote_material_cost);
                $('#labor_cost').val(response.quotation.quote_labor_cost);
                $('#other_cost').val(response.quotation.quote_other_cost);
                $('#sub_total_cost').val(response.quotation.quote_sub_total);
                $('#discount_cost').val(response.quotation.quote_discount);

                // taxes
                
                $('#vat_percent').val(response.quotation.vat_percentage);
                $('#ewt_percent').val(response.quotation.ewt_percentage);
                $('#vat_amount').val(response.quotation.vat_amount);
                $('#ewt_amount').val(response.quotation.ewt_amount);
                $('#total_amount').val(response.quotation.total_amount);

                if(response.quotation.is_vat == 1){
                    $('#is_vat').prop( "checked", true );
                    $('#vat_percent').prop('readonly', false);
                    $('#ewt_percent').prop('readonly', false);
                }


                // items
                var quotation_details = response.quotationDetails.filter(function(detail) {
                    return detail.quotation_id === quotation.id;
                });
                var itemCounter = 0;
                quotation_details.forEach(function(data) {
                    itemCounter++;

                    if (data.is_package == 1 && data.item_id == 0){
                            // loop packages
                        $('tbody#selectedDataList').append(
                            '<tr id="'+ itemCounter +'">'+
                                '<td class="col-md-1">'+ itemCounter +'</td>'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][item_id]" value="'+data.item_id+'" class="col-md-5">asd'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][package_id]" value="'+data.package_id+'" class="col-md-5">'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][is_package]" value="'+data.is_package+'" class="col-md-5">'+
                                '<td class="d-none"><input name="item['+ itemCounter +'][is_additional]" value="0">'+
                                '<td class="col-md-4">'+data.package.pack_name+'</td>'+
                                '<td class="col-md-2">PACKAGE</td>'+
                                '<td class="col-md-2"><input class="form-control quantity" type="text" name="item['+ itemCounter +'][item_qty]" value='+data.quote_qty+'></td>'+
                                '<td class="col-md-2"><input class="form-control price" type="text" name="item['+ itemCounter +'][order_amount]" value='+data.quote_amount+'></td>'+
                                '<td class="col-md-2"><input class="form-control totalAmount" type="text" name="item['+ itemCounter +'][order_total_amount]" value='+data.quote_total_amount+' readonly></td>'+
                                '<td class="col-md-1"><a class="btn btn-danger rounded"><i class="fas fa-trash text-light"></i></a></td>'+
                            '</tr>');
                    }
                    else if (data.item_id >= 1){
                        // loop items
                        var disableQtyPrice = (data.is_package == 1 && data.item_id >= 1)? 'readonly':'';

                        $('tbody#selectedDataList').append( 
                            '<tr id="'+ itemCounter +'">'+
                                '<td class="col-md-1">'+ itemCounter +'</td>'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][item_id]" value="'+data.item_id+'" class="col-md-5">asd'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][package_id]" value="'+data.package_id+'" class="col-md-5">'+
                                '<td class="col-md-2 d-none"><input name="item['+ itemCounter +'][is_package]" value="'+data.is_package+'" class="col-md-5">'+
                                '<td class="d-none"><input name="item['+ itemCounter +'][is_additional]" value="0">'+
                                '<td class="col-md-4">'+data.item.product_name+'</td>'+
                                '<td class="col-md-2">'+data.item.uom.uom_shortname+'</td>'+
                                '<td class="col-md-2"><input class="form-control quantity" '+disableQtyPrice+' type="text" name="item['+ itemCounter +'][item_qty]" value='+data.quote_qty+' ></td>'+
                                '<td class="col-md-2"><input class="form-control price" '+disableQtyPrice+' type="text" name="item['+ itemCounter +'][order_amount]" value='+data.quote_amount+'></td>'+
                                '<td class="col-md-2"><input class="form-control totalAmount" type="text" name="item['+ itemCounter +'][order_total_amount]" value='+data.quote_total_amount+' readonly></td>'+
                                '<td class="col-md-1"><a class="btn btn-danger rounded"><i class="fas fa-trash text-light"></i></a></td>'+
                            '</tr>');
                    }
                });
            },
            async: false
        });
    });
});
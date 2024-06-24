

  // for package
function getDataAndDisplay(url) {
    // Find all checkboxes that are checked in the modal table
    var selectedCheckboxes = $('#modalTable .rowCheckbox:checked');

    // Create an array to store selected data
    var selectedData = [];

    // Iterate through selected checkboxes and store the data
    selectedCheckboxes.each(function () {
      var rowData = $(this).val(); // Adjust the index based on your actual data structure
      selectedData.push(rowData);
    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Send the selected data to the server using AJAX
    $.ajax({
      type: 'POST',
      url: '/product/packages/selectedItems' , // Use the named route
      data: { selectedData: selectedData },
      headers: {
            'X-CSRF-TOKEN': csrfToken
        },
      success: function(response) {
        // Handle the server response if needed
        // For example, you can update the displayForm with the received data
        updateDisplayForm(response);
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }

  function updateDisplayForm(data) {
    // Clear previous data
    // $('#selectedDataList').empty();
    // console.log(data.selectedData[0])
    var itemCounter = 1;
    var qtyCounter = 1;
    var amountCounter = 1;
    var totalAmountCounter = 1;
    var totalCost = 0;
    $.each(data.selectedData, function(id,value){
      totalCost = totalCost + value.product_price;
    $('tbody#selectedDataList').append(
        '<tr>'+
            '<td class="col-md-2 d-none"><input name="item['+ itemCounter++ +'][item_id]" value='+value.id+' class="col-md-5">asd'+
            '<td class="col-md-4">'+value.product_name+'</td>'+
            '<td class="col-md-2">'+value.uom.uom_name+'</td>'+
            '<td class="col-md-2"><input class="form-control" type="text" id="qty['+ qtyCounter++ +']" name="qty['+ qtyCounter++ +'][item_qty]" value="1"></td>'+
            '<td class="col-md-2"><input class="form-control" type="text" id="amount['+ amountCounter++ +']" name="amount['+ amountCounter++ +'][order_amount]" value='+value.product_price+'.00></td>'+
            '<td class="col-md-2"><input class="form-control" type="text" id="total_amount['+ totalAmountCounter++ +']" name="total_amount['+ totalAmountCounter++ +'][order_total_amount]" value='+value.product_price+'.00 readonly></td>'+
            '<td class="col-md-1"><a class="btn btn-danger rounded"><i class="fas fa-trash text-light"></i></a></td>'+
        '</tr>');
    // console.log($(value))
      
        
    })
    
    // Append new data to the display form
    

    // Close the modal
    $('#itemListModal').modal('hide');

    // update material cost
    var materialCost = parseFloat($('#material_cost').val());
    var updatedCost = 0;
    // console.log(totalCost);
    updatedCost = materialCost + totalCost;
    $('#material_cost').val(updatedCost.toFixed(2));

  }





  // for package
  function getPackageDataAndDisplay(url) {
    // Find all checkboxes that are checked in the modal table
    var selectedCheckboxes = $('#modalTable2 .rowCheckbox:checked');

    // Create an array to store selected data
    var selectedData = [];

    // Iterate through selected checkboxes and store the data
    selectedCheckboxes.each(function () {
      var rowData = $(this).val(); // Adjust the index based on your actual data structure
      selectedData.push(rowData);
    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Send the selected data to the server using AJAX
    $.ajax({
      type: 'POST',
      url: '/product/packages/selectedPackagess' , // route(product-packages.selected-packages)
      data: { selectedData: selectedData },
      headers: {
            'X-CSRF-TOKEN': csrfToken
        },
      success: function(response) {
        // console.log('a/sd');
        // Handle the server response if needed
        // For example, you can update the displayForm with the received data
        updatePackageDisplayForm(response);
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }

  function updatePackageDisplayForm(data) {
    // Clear previous data
    // $('#selectedDataList').empty();
    // console.log(data.selectedData[0])
    var itemCounter = 1;
    var qtyCounter = 1;
    var amountCounter = 1;
    var totalAmountCounter = 1;
    $.each(data.selectedData, function(id,value){
      // console.log(data.selectedData);
    $('tbody#selectedDataList').append(
          '<tr>'+
          '<td class="col-md-2 d-none"><input name="item['+ itemCounter++ +'][item_id]" value='+value.id+' class="col-md-5">asd'+
          '<td class="col-md-4">'+value.pack_name+'</td>'+
          '<td class="col-md-2">PACKAGE</td>'+
          '<td class="col-md-2"><input class="form-control" type="text" id="item['+ qtyCounter++ +']" name="item['+ qtyCounter++ +'][item_qty]" value="1"></td>'+
          '<td class="col-md-2"><input class="form-control" type="text" id="item['+ amountCounter++ +']" name="item['+ amountCounter++ +'][order_amount]" value='+value.pack_price+'.00></td>'+
          '<td class="col-md-2"><input class="form-control" type="text" id="item['+ totalAmountCounter++ +']" name="item['+ totalAmountCounter++ +'][order_total_amount]" value='+value.pack_price+'.00 readonly></td>'+
          '<td class="col-md-1"><a class="btn btn-danger rounded"><i class="fas fa-trash text-light"></i></a></td>'+
          '</tr>');
    // console.log($(value))
      
        
    })
    
    // Append new data to the display form
    

    // Close the modal
    $('#packageListModal').modal('hide');
  }


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
    var currentTR = $('tbody#selectedDataList').children('tr').length; 
    var itemCounter = 1;
    var qtyCounter = 1;
    $.each(data.selectedData, function(id,value){
    currentTR++;
    $('tbody#selectedDataList').append(
        '<tr>'+
            '<td class="col-md-2 d-none"><input name="item['+ currentTR +'][item_id]" value='+value.id+' class="col-md-5"></input>'+
            '<td class="col-md-5">'+value.product_name+'</td>'+
            '<td class="col-md-2">'+value.uom.uom_name+'</td>'+
            '<td class="col-md-2"><input class="form-control" type="text" name="item['+ currentTR +'][item_qty]" required></input></td>'+
            '<td class="col-md-1"><button class="btn btn-danger removeItem" type="button" id="'+ currentTR +'">'+
                '<i class="fa-solid fa-trash"></i>'+
            '</button></td>'+
        '</tr>');
    })
    
    // Append new data to the display form
    

    // Close the modal
    $('#itemListModal').modal('hide');
  }

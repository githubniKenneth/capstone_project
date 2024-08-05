// Function to update total amount
function updateTotalAmount() {
            
  var vat_percent = $('#vat_percent').val();
  var ewt_percent = $('#ewt_percent').val();
  var vat_amount = $('#vat_amount');
  var ewt_amount = $('#ewt_amount');
  var total_amount = $('#order_total_amount');
  var sub_total_cost = $('#order_sub_total').val();
  var totalAmount = 0;
  var discount_cost = parseFloat($('#discount_cost').val()) || 0;

  // update vat amount
  if (vat_percent !== 0) {
      var vatPercentage = vat_percent / 100;
      var vatAmount = sub_total_cost * vatPercentage;
      vat_amount.val(vatAmount.toFixed(2));
  }
  

  // update ewt amount
  if (ewt_percent !== 0) {
      var ewtPercentage = ewt_percent / 100;
      var ewtAmount = sub_total_cost * ewtPercentage;
      ewt_amount.val(ewtAmount.toFixed(2));
  }
  

  totalAmount = (parseFloat(sub_total_cost) + parseFloat(vatAmount)) - parseFloat(ewtAmount) - discount_cost;

  // Update the total amount field
  $('#total_amount').val(parseFloat(totalAmount).toFixed(2)); // Assuming you want to display up to 2 decimal places
}

function getDataAndDisplay(url, event) {
  
    var selectedBUtton = $('#buttonName').text();
    var selectedCheckboxes = $('#modalTable .rowCheckbox:checked');
    var selectedData = [];

    selectedCheckboxes.each(function () {
      var rowData = $(this).val();
      selectedData.push(rowData);
    });

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#modalTable .rowCheckbox:checked').prop('checked', false);
    $.ajax({
      type: 'POST',
      url: '/product/packages/selectedItems' ,
      data: { selectedData: selectedData,
        selectedBUtton: selectedBUtton},
      headers: {
            'X-CSRF-TOKEN': csrfToken
        },
      success: function(response) {
        updateDisplayForm(response, selectedBUtton);
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }

  function updateDisplayForm(data, selectedBUtton) {
    
   
    var is_additional = 0;
    var itemType = "item";
    var tableId = "itemDetailsTable";
    var tableBody = "selectedDataList";
    if (selectedBUtton == "additionalDetails"){
      is_additional = 1;
      itemType = "additionalItem";
      tableId = "AddiotnalItemDetailsTable";
      tableBody = "selectedAdditionalDataList";
    }
    const body = $('#' + tableId + ' tbody');
    var rowCount = body.children('tr').length; 
    var totalCost = 0;

    if (selectedBUtton == "selectIssuances"){
      $.each(data.selectedData, function(id,value){
        rowCount++;
        totalCost = totalCost + value.product_price;
      $('tbody#'+tableBody).append(
          '<tr id="'+ rowCount +'">'+
              '<td class="col-md-2 d-none"><input name='+itemType+'['+ rowCount +'][item_id]" value='+value.id+' class="col-md-5">'+
              '<td class="col-md-1">'+ rowCount +'</td>'+
              '<td class="col-md-6">'+value.product_name+'</td>'+
              '<td class="col-md-2">'+value.uom.uom_name+'</td>'+
              '<td class="col-md-2"><input class="form-control quantity" type="number" id="" name='+itemType+'['+ rowCount +'][issued_qty]" value="1" required></td>'+
              '<td class="col-md-1"><button class="btn btn-danger removeItem" type="button" id="'+ rowCount +'"><i class="fa-solid fa-trash"></i></button></td>'+
          '</tr>');
      })
    }else{
      $.each(data.selectedData, function(id,value){
        rowCount++;
        totalCost = totalCost + value.product_price;
      $('tbody#'+tableBody).append(
          '<tr id="'+ rowCount +'">'+
              '<td class="col-md-2 d-none"><input name='+itemType+'['+ rowCount +'][item_id]" value='+value.id+' class="col-md-5">'+
              '<td class="col-md-2 d-none"><input name='+itemType+'['+ rowCount +'][is_additional]" value='+is_additional+' class="col-md-5">'+
              '<td class="d-none"><input name='+itemType+'['+ rowCount +'][package_id]" value=0>'+
              '<td class="d-none"><input name='+itemType+'['+ rowCount +'][is_package]" value=0>'+
              '<td class="col-md-1">'+ rowCount +'</td>'+
              '<td class="col-md-3">'+value.product_name+'</td>'+
              '<td class="col-md-2">'+value.uom.uom_name+'</td>'+
              '<td class="col-md-2"><input class="form-control quantity" type="number" id="" name='+itemType+'['+ rowCount +'][item_qty]" value="1" required></td>'+
              '<td class="col-md-2"><input required class="form-control price" type="number" id="" name='+itemType+'['+ rowCount +'][order_amount]" value='+value.product_price+'.00></td>'+
              '<td class="col-md-2"><input required class="form-control totalAmount" type="number" id="" name='+itemType+'['+ rowCount +'][order_total_amount]" value='+value.product_price+'.00 readonly></td>'+
              '<td class="col-md-1"><button class="btn btn-danger removeItem" data-pack="pack-'+value.package_id+'" type="button" id="'+ rowCount +'"><i class="fa-solid fa-trash"></i></button></td>'+
          '</tr>');
      })
    }
    
    // Close the modal
    $('#itemListModal').modal('hide');

    if (is_additional == 0 ){
      // update material cost
      var materialCost = parseFloat($('#material_cost').val());
      var materialUpdatedCost = 0;
      materialUpdatedCost = materialCost + totalCost;
      // update subtotal cost
      var subTotalCost = parseFloat($('#sub_total_cost').val());
      var subTotalUpdatedCost = 0;
      subTotalUpdatedCost = subTotalCost + totalCost;
      
      $('#material_cost').val(materialUpdatedCost.toFixed(2));
      $('#sub_total_cost').val(subTotalUpdatedCost.toFixed(2));
      updateTotalAmount()
    }
    else if(is_additional == 1){
      // update material cost
      var otherCost = parseFloat($('#other_cost').val());
      var otherUpdatedCost = 0;
      otherUpdatedCost = otherCost + totalCost;
      // update subtotal cost
      var subTotalCost = parseFloat($('#sub_total_cost').val());
      var subTotalUpdatedCost = 0;
      subTotalUpdatedCost = subTotalCost + totalCost;
      
      $('#other_cost').val(otherUpdatedCost.toFixed(2));
      $('#sub_total_cost').val(subTotalUpdatedCost.toFixed(2));
      updateTotalAmount()
    }
    
  }

  function getPackageDataAndDisplay(url) {

    var selectedBUtton = $('#buttonName').text();
    var selectedCheckboxes = $('#packageListModal .rowCheckbox:checked');
    var selectedData = [];
    selectedCheckboxes.each(function () {
      var rowData = $(this).val(); 
      selectedData.push(rowData);
    });
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#packageListModal .rowCheckbox:checked').prop('checked', false);
    $.ajax({
      type: 'POST',
      url: '/product/packages/selectedPackagess' , // route(product-packages.selected-packages)
      data: { selectedData: selectedData,
              selectedBUtton: selectedBUtton },
      headers: {
            'X-CSRF-TOKEN': csrfToken
        },
      success: function(response) {
        updatePackageDisplayForm(response, selectedBUtton);
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }

  function updatePackageDisplayForm(response, selectedBUtton) {

    var is_additional = 0;
    var itemType = "item";
    var tableId = "itemDetailsTable";
    var tableBody = "selectedDataList";

    if (selectedBUtton == "additionalDetails"){
      is_additional = 1;
      itemType = "additionalItem";
      tableId = "AddiotnalItemDetailsTable";
      tableBody = "selectedAdditionalDataList";
    }

    // var lastTrId = $('#'+tableId+' tbody tr:last').attr('id');
    // var packageCounter = (lastTrId == undefined) ? 0:lastTrId;
    const body = $('#' + tableId + ' tbody');
    var packageCounter = body.children('tr').length; 
    var selectedPackages = response.selected;
    var selectedPackagesDetails = response.selectedData;

    selectedPackages.forEach(function(package) {
        var totalCost = 0;
        packageCounter++;
        totalCost = totalCost + package.pack_price;
        var items = selectedPackagesDetails.filter(function(detail) {
            return detail.package_id === package.id;
        });

          
        $('tbody#'+tableBody).append(
          '<tr id="'+ packageCounter +'">'+
              '<td class="col-md-1">'+ packageCounter +'</td>'+
              '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][item_id]" value="0" ">'+
              '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][package_id]" value="'+package.id+'" ">'+
              '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][is_package]" value=1 ">'+
              '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][is_additional]" value='+is_additional+' ">'+
              '<td class="col-md-4">'+package.pack_name+'</td>'+
              '<td class="col-md-2">PACKAGE</td>'+
              '<td class="col-md-2"><input required class="form-control quantity" id="'+package.id+'" type="text" name='+itemType+'['+ packageCounter +'][item_qty]" value="1"></td>'+
              '<td class="col-md-2"><input required class="form-control price" type="text" name='+itemType+'['+ packageCounter +'][order_amount]" value='+package.pack_price+'.00></td>'+
              '<td class="col-md-2"><input required class="form-control totalAmount" type="text" name='+itemType+'['+ packageCounter +'][order_total_amount]" value='+package.pack_price+'.00 readonly></td>'+
              '<td class="col-md-1"><button class="btn btn-danger removeItem" data-pack="pack-'+package.package_id+'" type="button" id="'+ packageCounter +'"><i class="fa-solid fa-trash"></i></button></td>'+
          '</tr>');

        items.forEach(function(item) {
          packageCounter++;
            $('tbody#'+tableBody).append(
              '<tr id="'+ packageCounter +'" class="pack-'+package.package_id+'">'+
                  '<td class="col-md-1">'+ packageCounter +'</td>'+
                  '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][item_id]" value='+item.item_id+' ">'+
                  '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][package_id]"  value='+package.id+' ">'+
                  '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][is_package]" value="1" ">'+
                  '<td class="d-none"><input name='+itemType+'['+ packageCounter +'][is_additional]" value='+is_additional+' ">'+
                  '<td class="col-md-4">'+item.item.product_name+'</td>'+  
                  '<td class="col-md-2">'+item.item.uom.uom_name+'</td>'+
                  '<td class="col-md-2"><input class="form-control required quantity pack_'+package.id +'" type="text" id="" name='+itemType+'['+ packageCounter +'][item_qty]" value="'+item.item_qty+'" readonly></td>'+
                  '<td class="col-md-2"><input class="form-control required price" type="text" id="" name='+itemType+'['+ packageCounter +'][order_amount]" value=0 readonly></td>'+
                  '<td class="col-md-2"><input class="form-control required totalAmount" type="text" id="" name='+itemType+'['+ packageCounter +'][order_total_amount]" value=0 readonly></td>'+
              '</tr>');
        });
      if (is_additional == 0){
        var materialCost = parseFloat($('#material_cost').val());
        var materialUpdatedCost = 0;
        materialUpdatedCost = materialCost + totalCost;
        // update subtotal cost
        var subTotalCost = parseFloat($('#sub_total_cost').val());
        var subTotalUpdatedCost = 0;
        subTotalUpdatedCost = subTotalCost + totalCost;
        
        $('#material_cost').val(materialUpdatedCost.toFixed(2));
        $('#sub_total_cost').val(subTotalUpdatedCost.toFixed(2));
        updateTotalAmount();
      }
      else if (is_additional == 1){
        var otherCost = parseFloat($('#other_cost').val());
        var otherUpdatedCost = 0;
        otherUpdatedCost = otherCost + totalCost;
        // update subtotal cost
        var subTotalCost = parseFloat($('#sub_total_cost').val());
        var subTotalUpdatedCost = 0;
        subTotalUpdatedCost = subTotalCost + totalCost;
        
        $('#other_cost').val(otherUpdatedCost.toFixed(2));
        $('#sub_total_cost').val(subTotalUpdatedCost.toFixed(2));
        updateTotalAmount();
      }
      
    });
    
    // Close the modal
    $('#packageListModal').modal('hide');
  }
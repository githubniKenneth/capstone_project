
        // function to update sub total amount
        function updateSubTotal() {
            
            var material_cost = parseFloat($('#material_cost').val()) || 0;
            var labor_cost = parseFloat($('#labor_cost').val()) || 0;
            var other_cost = parseFloat($('#other_cost').val()) || 0;
            var totalAmountSub = material_cost + labor_cost + other_cost;
            // Update the total amount field
            $('#sub_total_cost').val(totalAmountSub.toFixed(2)); // Assuming you want to display up to 2 decimal places
        }

        // update the total amount every input
        $('.material_cost, .labor_cost, .other_cost').on('input', function() {
            updateSubTotal();
            
            updateTotalAmount();
        });

        // Initial sub total amount update
        updateSubTotal();
        // });

        // Function to update total amount
        function updateTotalAmount() {
            
            var vat_percent = $('#vat_percent').val();
            var ewt_percent = $('#ewt_percent').val();
            var vat_amount = $('#vat_amount');
            var ewt_amount = $('#ewt_amount');
            var total_amount = $('#total_amount');
            var sub_total_cost = $('#sub_total_cost').val();
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

        // Initial total amount update
        updateTotalAmount();
        
        // update items total price
        $('#itemDetailsTable').on('input', 'input.quantity, input.price', function() {
            var totalMaterialCost = 0;
            var row = $(this).closest('tr'); // Find the closest row
            var quantity = parseFloat(row.find('.quantity').val()) || 0; // Get values from the current row
            var price = parseFloat(row.find('.price').val()) || 0;
            var totalAmount = quantity * price;

            row.find('.totalAmount').val(totalAmount.toFixed(2));                 // Update the total amount in the current row

            $('.totalAmount').each(function () {
            totalMaterialCost += parseFloat($(this).val()) || 0;
            });
            $('#material_cost').val(totalMaterialCost.toFixed(2));

            updateSubTotal();
            updateTotalAmount();
            
            });

        $('#AddiotnalItemDetailsTable').on('input', 'input.quantity, input.price', function() {
            var totalOtherCost = 0;
            var row = $(this).closest('tr'); // Find the closest row
            var quantity = parseFloat(row.find('.quantity').val()) || 0; // Get values from the current row
            var price = parseFloat(row.find('.price').val()) || 0;
            var totalAmount = quantity * price;

            row.find('.totalAmount').val(totalAmount.toFixed(2));                 // Update the total amount in the current row
            $('.totalAmount').each(function () {
            totalOtherCost += parseFloat($(this).val()) || 0;
            });
            $('#other_cost').val(totalOtherCost.toFixed(2));

            updateSubTotal();
            updateTotalAmount();
            
            });

        // TAX VAT COMPUTATIOn
        // TAX VAT DECLARATION

        // Attach an event handler to the checkbox change event
        var vat_percent = $('#vat_percent');
        var ewt_percent = $('#ewt_percent');
        
        $('#is_vat').change(function () {
            // initial value 
            vat_initial_value = vat_percent.val() == 0 ? 12 : 0;
            // ewt_initial_value = ewt_percent.val() == 0 ? 12 : 0;
            // Get the checked state of the checkbox
            var isChecked = $(this).prop('checked');
            // remove readonly
            vat_percent.prop('readonly', !isChecked);
            ewt_percent.prop('readonly', !isChecked);
            // add value to vat
            vat_percent.val(vat_initial_value);
            ewt_percent.val(0);

            // updateTaxAmount();
            updateTotalAmount();
        });


        // upon input update tax calculation
        $('.vat_percent, .ewt_percent, .labor_cost, .other_cost, .discount_cost').on('input', function() {
            
            updateTotalAmount();
            // updateTaxAmount();
        });

        // function updateItemQty(){
        $('#itemDetailsTable').on('input', 'input.quantity, input.price', function() {
            var row = $(this).closest('tr'); // Find the closest row
            var rowId = row.attr('id');
            var packageId = row.find('.quantity').attr('id');
            var packQuantity = parseFloat(row.find('.quantity').val()) || 0;
            // console.log(packageId);
            var packageDetailsQty = $("#itemDetailsTable").find('.pack_'+packageId +'');
            console.log(packageDetailsQty);
            packageDetailsQty.each(function(index, element) {
                var defaultValue = $(element).prop('defaultValue');
                var updatedQty = defaultValue * packQuantity;
                $(element).val(updatedQty);
            });
        });

        $('#AddiotnalItemDetailsTable').on('input', 'input.quantity, input.price', function() {
            var row = $(this).closest('tr'); // Find the closest row
            var rowId = row.attr('id');
            var packageId = row.find('.quantity').attr('id');
            var packQuantity = parseFloat(row.find('.quantity').val()) || 0;
            
            var packageDetailsQty = $("#AddiotnalItemDetailsTable").find('.pack_'+packageId +'');
            // console.log(packageDetailsQty);
            packageDetailsQty.each(function(index, element) {
                var defaultValue = $(element).prop('defaultValue');
                var updatedQty = defaultValue * packQuantity;
                $(element).val(updatedQty);
            });
        });
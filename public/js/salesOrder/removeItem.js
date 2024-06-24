


$(document).ready(function() {
    $(document).on('click', '.removeItem', function() {
        var packValue = $(this).data('pack');
        var row = $(this).closest('tr');
        var rowTotalAmount = parseFloat(row.find('.totalAmount').val());

        if (packValue)
            {
                $('.'+packValue).each(function() {
                    $(this).remove();
                });
                deductTotalAmount(rowTotalAmount);
                $(this).parents().eq(1).remove();
            }
        else
        {
            deductTotalAmount(rowTotalAmount);
            $(this).parents().eq(1).remove();

        }
    });

    function deductTotalAmount(amount) {
        var currentTotal = parseFloat($('#total_amount').val());
        var materialCost = parseFloat($('#material_cost').val());
        var sub_total = parseFloat($('#sub_total_cost').val());

        var newMaterialCost = materialCost - amount;
        var newSubTotal = sub_total - amount;
        var newTotal = currentTotal - amount;
        $('#total_amount').val(newTotal.toFixed(2));
        $('#material_cost').val(newMaterialCost.toFixed(2));
        $('#sub_total_cost').val(newSubTotal.toFixed(2));

        updateTax(newSubTotal, amount);
    }

    function updateTax(subTotal, rowAmount)
    {
        var vat_percent = $('#vat_percent').val();
        var ewt_percent = $('#ewt_percent').val();
        var vat_amount = $('#vat_amount');
        var ewt_amount = $('#ewt_amount');
        var total_amount = $('#total_amount').val();

        // update vat amount
        if (vat_percent !== 0) {
            var vatPercentage = vat_percent / 100;
            var vatAmount = subTotal * vatPercentage;
            vat_amount.val(vatAmount.toFixed(2));

            var rowVat = rowAmount * vatPercentage;
            var updated_total = total_amount - rowVat;
            $('#total_amount').val(updated_total.toFixed(2));
        }
        

        // update ewt amount
        if (ewt_percent !== 0) {
            var ewtPercentage = ewt_percent / 100;
            var ewtAmount = subTotal * ewtPercentage;
            ewt_amount.val(ewtAmount.toFixed(2));

            // var rowEwt = rowAmount * ewtPercentage;
            // var updated_total = total_amount - rowEwt;
            // $('#total_amount').val(updated_total.toFixed(2));
        }
    }
});

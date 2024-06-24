
<h3>Hi, {{ $quotation->quote_name }}</h3>
<p>Here is your quotation from your request number {{ $quotation->quote_control_number }}</p>

<h5>Item Details</h5>
        <table style="width: 75%; border-collapse: collapse;">
            <thead>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>No</b></b></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>Item Name</b></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>Unit</b></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>Qty</b></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>Price</b></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><b>Total Price</b></td>
            </tr>
            </thead>
            <tbody id="selectedDataList">
                
                @foreach ($quotation_details as $quotation_detail)
                    @if ($quotation_detail->item_id !== 0)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{$loop->iteration}}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $quotation_detail->item->product_name}}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $quotation_detail->item->uom->uom_shortname}}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $quotation_detail->quote_qty}}</td>
                            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($quotation_detail->quote_amount, 2, '.', '') }}</td>
                            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($quotation_detail->quote_total_amount, 2, '.', '') }}</td>
                        </tr>
                    @elseif ($quotation_detail->item_id == 0)
                        
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{$loop->iteration}}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $quotation_detail->package->pack_name}}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">PACKAGE</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $quotation_detail->quote_qty}}</td>
                            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($quotation_detail->quote_amount, 2, '.', '') }}</td>
                            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($quotation_detail->quote_total_amount, 2, '.', '') }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="5" style="border: 1px solid #ddd; padding: 8px;">Total Amount</td>
                    <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($quotation->total_amount, 2, '.', '') }}</td>
                </tr>
            </tbody>
        </table>

        
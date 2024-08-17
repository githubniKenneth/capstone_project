

<h3>Hi, {{ $job_order->client->client_full_name }}</h3>
<p>Here is your Job Order number <b>{{ $job_order->jo_control_no }}</b></p>

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
        
        @foreach ($ordered_items as $item)
            @if ($item->item_id !== 0)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$loop->iteration}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->item->product_name}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->item->uom->uom_shortname}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->order_qty}}</td>
                    <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($item->order_amount, 2, '.', '') }}</td>
                    <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($item->order_total_amount, 2, '.', '') }}</td>
                </tr>
            @elseif ($item->item_id == 0)
                
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{$loop->iteration}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->package->pack_name}}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">PACKAGE</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->order_qty}}</td>
                    <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($item->order_amount, 2, '.', '') }}</td>
                    <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($item->order_total_amount, 2, '.', '') }}</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Material Cost</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->order_material_cost, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Labor Cost</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->order_labor_cost, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Other Cost</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->order_other_cost, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Vat Amount</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->vat_amount, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Ewt Amount</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->ewt_amount, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Discount</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->order_discount, 2, '.', '') }}</td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Total Amount</td>
            <td style="border: 1px solid #ddd; padding: 4px;">{{ number_format($job_order->orders->order_total_amount, 2, '.', '') }}</td>
        </tr>
    </tbody>
</table>

<!--         
<p>Total Amount is {{ number_format($job_order->orders->order_total_amount, 2, '.', '') }}</p> -->

<p>If you wish to pay it Online via Gcash please click the button below</p>

<a href="{{ route('job-order.gcash', $job_order->id) }}" style="
  display: inline-block;
  font-weight: 400;
  color: #fff;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  background-color: #007bff;
  border: 1px solid #007bff;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  text-decoration: none;
" onmouseover="this.style.backgroundColor='#0056b3'; this.style.borderColor='#004085';" onmouseout="this.style.backgroundColor='#007bff'; this.style.borderColor='#007bff';">
  Pay using Gcash
</a>
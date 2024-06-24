

<h3>Hi, {{ $job_order->client->client_full_name }}</h3>
<p>Here is your Job Order number <b>{{ $job_order->jo_control_no }}</b></p>
<p>Total Amount is {{ number_format($job_order->orders->order_total_amount, 2, '.', '') }}</p>

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

<h3>Hi, {{ $job_order->client->client_full_name }}</h3>
<p>Your Job Order number <b>{{ $job_order->jo_control_no }}</b> has made an online payment with a reference number of {{ $reference_no }} amounting {{number_format($amount, 2, '.', '') }} was {{$payment_status}}!</p>

<p>Thank you for your prompt payment. We appreciate your business and look forward to serving you again!</p>

<p>Best regards,<br>Citi Security</p>
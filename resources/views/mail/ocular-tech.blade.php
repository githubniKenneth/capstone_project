<h3>Hi, {{ $technician->emp_full_name }}</h3>
<p>Please be informed that you have schedule today {{$date}} for Ocular Visitation.</p>

<p>Here's the details of the Client:</p>
<ul>
    <li>Name: {{$client->client_full_name}}</li>
    <li>Contact No.: {{$client->client_mobile_no}}</li>
    <li>Address: {{$client->client_full_address}}</li>
    <li>Landmark: {{$ocular->ocular_landmark}}</li>
</ul>

<p>You will be with:</p>
<ul>
    @foreach ($employees as $employee)
        <li>{{$employee->emp_full_name}} - {{$employee->emp_phone_no}}</li>
    @endforeach
</ul>
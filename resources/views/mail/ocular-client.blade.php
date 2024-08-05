<h3>Hi, {{ $client->client_full_name }}</h3>
<p>Our Team is coming to you {{$date}} for Ocular Visitation. Please keep your phone available, we will contact you when we are around.</p>

<p>Here's the list of Technicians coming on your way:</p>
<ul>
    @foreach ($employees as $employee)
        <li>{{$employee->emp_full_name}} - {{$employee->emp_phone_no}}</li>
    @endforeach
</ul>
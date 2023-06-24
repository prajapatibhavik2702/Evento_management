@component('mail::message')

Website Name : <b>Event Ticket System</b>
<br><br>
Hello <b>{{ $name }}</b>,

Congratulations!  Your ticket has been succefully booked  THANK YOU. From now on, you can surf our website to explore a lot of interesting things with your account information as below.

<br>
Name : <b>{{ $name }}</b><br>
Email : <b>{{ $email }}</b> <br>

@component('mail::button', ['url' => route('checkout',$id)])
Show Your Ticket
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent

@component('mail::message')

Website Name : <b>Event Ticket System</b>
<br><br>
Hello <b>{{ $name }}</b>,

Congratulations! Admin has been add Guest user for you. From now on, you can surf our website to explore a lot of interesting things with your account information as below.

<br>
Name : <b>{{ $name }}</b><br>
Email : <b>{{ $email }}</b> <br>
MobileNumber : <b>{{ $mobilenumber }}</b><br>
Password :<b>{{ $password }}</b><br>

@component('mail::button', ['url' => route('dashboard1')])
Login Website Enjoy!
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent

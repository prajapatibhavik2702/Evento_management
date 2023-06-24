@component('mail::message')

Website Name : <b>Event Ticket System</b>
<br><br>
Hello <b>{{ $name }}</b>,

Congratulations! Your account has been approved. From now on, you can surf our website to explore a lot of interesting things with your account information as below.

Email : <b>{{ $email }}</b> <br>
Password :<b>{{ $password }}</b>

@component('mail::button', ['url' => route('organiser.login')])
View Website Enjoy!
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent

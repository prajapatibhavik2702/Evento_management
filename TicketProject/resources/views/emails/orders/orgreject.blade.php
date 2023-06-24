@component('mail::message')

Website Name : <b>Event Ticket System</b>
<br><br>
Hello <b>{{ $name }}</b>,

Thank you for registering your account at our website. Unfortunately, we cannot accept your account.

Please contact us for more information.
<br>
@component('mail::button', ['url' => route('dashboard1')])
View Website
@endcomponent

Thanks,<br>
<b>{{ config('app.name') }}</b>
@endcomponent

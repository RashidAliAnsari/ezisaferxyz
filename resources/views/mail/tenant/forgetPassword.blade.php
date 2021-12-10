@component('mail::message')
Hello!

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => $url, 'color' => 'green'])
Reset Password
@endcomponent

<br>This password reset link will expire in 60 minutes.
If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}

<hr>
If you're having trouble clicking the 'Reset Password' button, copy and paste URL below into your web browser.
<a href="{{$url}}">{{$url}}</a>
@endcomponent

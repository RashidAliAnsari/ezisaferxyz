@component('mail::message')
Hello {{$customer['name']}}

@component('mail::panel')
<h4 style="color: #00264d;text-align:center;">{{$customer['verification_code']}}</h4>
<br><br>
Please find the confirmation code to confirm your email address. Once you enter this you'll be up and running on the Ezisafer platform immediately:
<br><br>
@component('mail::button', ['url' => $customer['subdomain'].'/verify/email', 'color' => 'green'])
Confirm Email
@endcomponent

@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

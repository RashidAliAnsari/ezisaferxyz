@component('mail::message')
Hi {{$agency['agency_name']}}

@component('mail::panel')
<h4 style="color: #00264d;text-align:center;">{{$agency['verification_code']}}</h4>
<br><br>
Please find the confirmation code to confirm your email address. Once you enter this you'll be up and running on the Ezisafer platform immediately:
<br><br>
@component('mail::button', ['url' => $agency['domain'].'/verify/email', 'color' => 'green'])
Confirm Email
@endcomponent

@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent

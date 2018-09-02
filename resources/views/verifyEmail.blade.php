@component('mail::message')
# Welcome to Gateways 2018

Thank you for registering your account on our website. Please use this link to <b>Activate</b> your account.
<br>

<p style="text-align: center;">
	<a href="{{ route('sendEmailDone.user',["email" => $student->email, "verifyToken" => $student->verifyToken]) }}">Activate Account</a>
</p>


<br><br>

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Gateways Admin
@endcomponent

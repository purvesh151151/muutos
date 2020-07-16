<br/>
Dear {{$user['name']}},
<br/><br/>
Welcome to Xfactor Family. We are glad to have you on-boarded on Xfactor portal. Kindly see your login details as below.
<br/><br/>
Please verify your account as well using below link.
<br/>
@if(isset($user['utokan']))
<a class="btn btn-primary" href="{{url('user/verify', $user['utokan'])}}">Click Here to verify.</a>
@endif
<br/><br/>
Email = {{$user['email']}}
<br/>Password = {{ $user['passwordorignal'] }}
<br/><br/>
Best Regards,<br/>
Team Xfactor
<br/>
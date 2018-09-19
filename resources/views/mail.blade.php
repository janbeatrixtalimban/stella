
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
{{-- <h2>Welcome to the site {{$create['firstName']}}</h2> --}}
<br/>
This email is your registered email , Please click on the below link to verify your email account
<br/>
{{-- <a href="{{url('user/verify', $create->verifyUser->token)}}">Verify Email</a> --}}
{{-- ->action('Verify account', route('verify', $this->user->token))
<a href="{{route('login')}}">login here</a> --}}
{{-- <a href="{{route('verify', sendVerifyAccount())}}">Verify</a> --}}
</body>
 
</html>
 
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<p>Welcome to TESTmatic, {{ $user->first_name }}</p>

@if($user->role == 'Test Administrator')

<p>You have been added as a Test administrator. As test administrator, you have access to:</p>

<ul>
	<li>Create test projects</li>
	<li>Add test participants</li>
	<li>Start an online usability testing</li>
	<li>Generate test reports</li>
</ul>

@endif

@if($user->role == 'Test Participant')

<p>You have been added as a Test participant. Please wait for invitations from test administrators to start the online usability testing.</p>

@endif

<p>To log-in, please confirm your account <a href="{{ url('/users/confirm', $user->confirmation_token) }}">here</a>:</p>

<p>You'll be asked to set a password when you first log in.  Passwords are case sensitive.

<p>To log in now, click: <a href="{{ url('login') }}">www.testmatic.com/login</a></p></p>

<p>For assistance, contact us at admin@testmatic.com. Once again, welcome to TESTmatic!
</p>

<p>TESTmatic is an online usability testing tool which will allow business owners to get a sense of how users like you would feel about their website. With TESTmatic, you will be able to help them get suggestions from actual users, know what to enhance on their website and make it more user friendly.</p>

<p>START YOUR USABILITY TEST NOW! <a href="{{ url('login') }}">www.testmatic.com/login</a></p>

</body>
</html>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<p>Welcome to your new project, {{ $user->first_name }}</p>

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

<p>To log-in, please enter the following information in the <a href="{{ url('login') }}">log-in page</a>:</p>

<p>Username: {{ $user->username }}</p>
<p>Password: {{ $user->password }}</p>

<p>You'll be asked to set a password when you first log in.  Passwords are case sensitive.  You'll also be asked to set a password question and answer that will be used if you forget your password.

<p>To log in now, click: <a href="#"></a></p>

<p>For assistance, contact us at admin@testmatic.com. Once again, welcome to TESTmatic!
</p>

<p>TESTmatic is an online usability testing tool which will allow business owners to get a sense of how users like you would feel about their website. With TESTmatic, you will be able to help them get suggestions from actual users, know what to enhance on their website and make it more user friendly.</p>

<p>START YOUR USABILITY TEST NOW! <a href="{{ url('login') }}">www.testmatic.com/login</a></p>

</body>
</html>
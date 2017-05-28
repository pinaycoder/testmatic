<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TESTmatic') }}</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">TM+</h1>

            </div>
            
            <p>Please set your password below:</p>
            @if(count($errors->all()) > 0)
              @include('layouts.errors')
            @endif
            <form method="POST" action="/users/setpassword/{{ $user->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Set Password</button>

            </form>
            <p class="m-t"> <small>TESTmatic &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body>

</html>


<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title page-title>TESTmatic</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        .testing-footer,
        .testing-header{
            min-height: 50px;
            background-color: #1ab394;
            border-color: #1ab394;
            color: #FFFFFF;
            padding: 5px;
            font-size: 18px;
            line-height: 18px;
        }

        .testing-footer .footer-desc{
            border: 1px solid #FFFFFF;
            padding: 5px;
            min-height: 77px;
            vertical-align: middle;
            font-size: 18px;
            line-height: 18px;
        }

        .testing-footer .btn-default{
            color: #000000;
            font-weight: bold;
        }

        .testing-main-panel{
            height: 520px;
        }

        .testing-welcome{
            height: 560px;
        }

        .question-selections-ul{
            list-style-type: none;
        }

        .iframe-div,
        .iframe-div iframe{
            height: 100%;
            width: 100%;
        }

    </style>
</head>

<body>

    <div class="testing-header">
        +TM TESTMATIC
    </div>

    @yield('content')

    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>

</body>

</html>

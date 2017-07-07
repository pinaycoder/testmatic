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

        .testing-header{
            font-size: 30px;
            line-height: 40px;
        }

        .testing-footer .footer-desc{
            border: 1px solid #FFFFFF;
            padding: 5px;
            min-height: 77px;
            vertical-align: middle;
            font-size: 18px;
            line-height: 18px;
        }

        .footer-btn{
            min-height: 77px;
        }

        .footer-btn div{
            height: 70px; 
            width: 200px;
            display:table-cell;
            vertical-align:middle;
        }

        .footer-desc div{
            height: 70px; 
            width: 100%;
            display:table-cell;
            vertical-align:middle;
        }

        .testing-footer .btn-default{
            color: #000000;
            font-weight: bold;
        }

        .testing-question-panel{
            height: 500px;
            margin-bottom: 0;
            padding: 50px;
        }

        .testing-iframe-panel{
            height: 500px;
        }

        .testing-welcome{
            height: 500px;
            margin-bottom: 0;
            padding: 150px;
        }

        .question-selections-ul{
            list-style-type: none;
        }

        .question-selections-li{
            margin-bottom: 15px;
            font-size: 21px;
            font-weight: 200;
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
    <script src="//cdn.webrtc-experiment.com/getScreenId.js"></script>
    <script src="//cdn.webrtc-experiment.com/screen.js"></script>
    <script>
        $(document).ready(function(){
            $('#mark_complete').on('click', function(){
                document.domain = 'lazada.com.ph';
;                console.log($('iframe')[0].contentWindow.location.href)
                /**$('.testing-footer, .testing-header').hide();

                $.get('/projects/markComplete', function(data){
                    console.log(data);
                    $('.testing-footer, .testing-header').show();

                    alert('Screenshot taken. Marked as completed!');
                });**/

            });
        });
    </script>
</body>

</html>
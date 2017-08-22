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
            height: 50px;
        }

        .testing-footer{
            min-height: 87px;
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
            max-width: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            height: 65px;
            max-height: 65px;
        }

        .running-time-div{
            height: 45px !important;
            margin: 10px auto;
        }

        .testing-footer .btn-default{
            color: #000000;
            font-weight: bold;
        }

        .testing-question-panel{
            height: 525px;
            margin-bottom: 0;
            padding: 50px;
        }

        .testing-iframe-panel{
            height: 525px;
        }

        .testing-welcome,
        .testing-complete{
            height: 525px;
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
    @if(isset($project_component))
    <script>

        var extensionId = "kegdbcgopmmfabicalpcohlknnabcfgd";
        var yourMessage = 'capture';

        function screenshot(){
            alert('TEST');
            /**$('.testing-footer, .testing-header').hide();
            $('.testing-iframe-panel').css('height', $(window).height() + 'px');
            **/
            chrome.runtime.sendMessage(extensionId, yourMessage,
                function(response) {
                    
                    $.ajax({
                      type: "POST",
                      url: "/projects/markComplete/{{ $project->id }}/{{ $project_component->id }}/{{ Auth::user()->id }}",
                      data: {image: response.imgSrc, _token : "{{ csrf_token() }}"}
                    }).done(function( respond ) {
                        /**$('.testing-iframe-panel').css('height', '525px');
                        $('.testing-footer, .testing-header').show();**/
                        alert("Saved filename: "+respond);
                    });
                });
        }

        $(document).ready(function(){

            var isMarkedComplete = false;

            $('#mark_complete').on('click', function(){

                screenshot();

                isMarkedComplete = true;
            });

            $('#question-next-btn').on('click', function(){
                if($('.question-selections-checkbox:checked').length <= 0){
                    alert('Please select your choice.');
                    return false;
                }
            });

            $('#scenario-next-btn').on('click', function(){
                if(!isMarkedComplete){
                    alert('Please mark this scenario as complete first.');
                    return false;
                }
            });
        });
    </script>
    @endif
</body>

</html>

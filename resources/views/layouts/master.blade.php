<!DOCTYPE html>
<html ng-app="inspinia" lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title page-title>TESTmatic</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Angular notify -->
    <link href="/css/plugins/angular-notify/angular-notify.min.css" rel="stylesheet">

    <!-- Style for wizard - based on Steps plugin-->
    <link href="/css/plugins/steps/jquery.steps.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        .table-title a {
            font-size: 14px;
            color: #676a6c;
            font-weight: 600;
        }

        .option-buttons{
            width: 65px;
        }

        .dt-tables td{
            vertical-align: middle !important;
        }

        .options-td{
            width: 82px !important;
            max-width: 82px !important;
            overflow: hidden;
            border: solid red;
            vertical-align: top !important;
        }

    </style>

</head>

<body ng-controller="mainCtrl as main">

<div id="wrapper">

    @include('layouts.navigation')

    <div id="page-wrapper" class="gray-bg">

        @include('layouts.topnavbar')

        @include('layouts.pageheading')

        <div ui-view class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                        @yield('content')
                    
                </div>
            </div>
        </div>

        @include('layouts.footer')

    </div>
</div>

<!-- Mainly scripts -->
<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Data Tables -->
<script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>

<!-- Angular scripts-->
<!-- <script src="/js/angular/angular.min.js"></script>
<script src="/js/ui-router/angular-ui-router.min.js"></script>
<script src="/js/bootstrap/ui-bootstrap-tpls-0.11.0.min.js"></script>

Angular Dependiences 
<script src="/js/plugins/peity/angular-peity.js"></script>
<script src="/js/plugins/easypiechart/angular.easypiechart.js"></script>
<script src="/js/plugins/flot/angular-flot.js"></script>
<script src="/js/plugins/rickshaw/angular-rickshaw.js"></script>
<script src="/js/plugins/summernote/angular-summernote.min.js"></script>
<script src="/js/bootstrap/angular-bootstrap-checkbox.js"></script>
<script src="/js/plugins/jsKnob/angular-knob.js"></script>
<script src="/js/plugins/switchery/ng-switchery.js"></script>
<script src="/js/plugins/nouslider/angular-nouislider.js"></script>
<script src="/js/plugins/datapicker/datePicker.js"></script>
<script src="/js/plugins/chosen/chosen.js"></script>
<script src="/js/plugins/dataTables/angular-datatables.min.js"></script>
<script src="/js/plugins/fullcalendar/gcal.js"></script>
<script src="/js/plugins/fullcalendar/calendar.js"></script>
<script src="/js/plugins/chartJs/angles.js"></script>
<script src="/js/plugins/uievents/event.js"></script>
<script src="/js/plugins/nggrid/ng-grid-2.0.3.min.js"></script>
<script src="/js/plugins/ui-codemirror/ui-codemirror.min.js"></script>
<script src="/js/plugins/uiTree/angular-ui-tree.min.js"></script>
<script src="/js/plugins/angular-notify/angular-notify.min.js"></script>
<script src="/js/plugins/colorpicker/bootstrap-colorpicker-module.js"></script>
-->
<!-- Anglar App Script -->
<!--<script src="/js/app.js"></script>
<script src="/js/config.js"></script>
<script src="/js/directives.js"></script>
<script src="/js/controllers.js"></script>
-->
<script>
    $(document).ready(function() {
        $('.dt-tables').dataTable({
            responsive: true,
            lengthChange: false

        })
    });
</script>

</body>

</html>

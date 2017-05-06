<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title page-title>TESTmatic</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/plugins/chosen/chosen.css" rel="stylesheet">
    <!-- Angular notify -->
    <link href="/css/plugins/angular-notify/angular-notify.min.css" rel="stylesheet">

    <!-- Style for wizard - based on Steps plugin-->
    <link href="/css/plugins/steps/jquery.steps.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        .table-title a {
            font-size: 14px;
            color: #676a6c;
            font-weight: 600;
        }

        /**.option-buttons{
            width: 75px;
        }

        .dt-tables td{
            vertical-align: middle !important;
        }

        .options-td{
            width: 82px !important;
            max-width: 82px !important;
            overflow: hidden;
            vertical-align: top !important;
        }**/

        .user-details-dl dt, 
        .user-details-dl dd{
            text-align: left;
        }

        .form-group span{
            vertical-align: middle;
        }

        .user-details-img-div{
            min-height: 150px;
            max-width: 150px;
            margin: 10px auto;
        }

        .user-details-img{
            width: 100%;
            border: solid gray 1px;
        }

        .scenario-mandatory,
        .question-mandatory{
            display: none;
        }

        .chosen-container{
            width: 400px !important;
        }

    </style>
</head>

<body>

<div id="wrapper">

    @include('layouts.navigation')

    <div id="page-wrapper" class="gray-bg">

        @include('layouts.topnavbar')

        @include('layouts.pageheading')

        <div class="wrapper wrapper-content animated fadeInRight">
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
<script src="/js/inspinia.js">
</script>

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
<!-- Chosen -->
<script src="/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Steps -->
<script src="/js/plugins/steps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="/js/plugins/validate/jquery.validate.min.js"></script>

<!-- Data picker -->
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {

        $('.dt-tables').dataTable({
            'lengthChange': false,
            'ordering': false
        });

        $("#wizard").steps();
        $(".form-wizards").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            greaterThan: "#password"
                        }
                    }
                });

        $('.input-group.date').datepicker({
                todayBtn: "linked",
                format: 'yyyy-mm-dd',
                calendarWeeks: true,
                autoclose: true
            });

        var table = $('#add-component-table').DataTable({
                                              "columns": [
                                                { "data": "order" },
                                                { "data": "type" },
                                                { "data": "description" },
                                                { "data": "help_text" },
                                                { "data": "target" },
                                                { "data": "selections" },
                                                { "data": "time_limit" }
                                              ],
                                            "paging": false,
                                            "ordering": false,
                                            "lengthChange": false,
                                            "searching": false,
                                            "info": false
                                            });

        var components = [];

        if($('#components-json').val()){
            components = JSON.parse($('#components-json').val());
            table.rows.add(components).draw(false);
        }

        var counter = components.length + 1;

        $('#add-component-modal').on('show.bs.modal', function(){
            $('#add-component-form #order').val(counter).attr('readonly','readonly');
        });

        $('#add-participants-modal').on('show.bs.modal', function(){
            $('.chosen-select', this).chosen('destroy').chosen();
        });

        $('#add-component-row-btn').on('click', function () {

            var isValidForm = true;

            $('#add-component-form').validate({
              invalidHandler: function(event, validator) {
                isValidForm = false;
                return false;
              }
            }).form();

            if(isValidForm){

                var component = {
                                    "order": counter,
                                    "type": $('#add-component-form #type').val(),
                                    "description": $('#add-component-form #description').val(),
                                    "help_text": $('#add-component-form #help_text').val(),
                                    "target": $('#add-component-form #target').val(),
                                    "selections": $('#add-component-form #selections').val(),
                                    "time_limit": $('#add-component-form #time_limit').val()
                                };

                components.push(component);
                
                table.row.add(component).draw(false);

                counter++;

                $('#add-component-form')[0].reset();
                $('#add-component-modal').modal('hide');  

                $('#components-json').val(JSON.stringify(components));
            }

        });

        $('#add-component-form #type').on('change', function(){
            if(this.value == 'Question'){
                $('.scenario-mandatory').hide();
                $('.question-mandatory').show();
            } 

            if(this.value == 'Scenario'){
                $('.question-mandatory').hide();
                $('.scenario-mandatory').show();
            }
        }); 

        $('#add-participants-row-btn').on('click', function(){
            $('#selected_users').val($(".chosen-select").val());
            $('#add-participants-form').submit();

        });
    
   });

</script>

</body>

</html>

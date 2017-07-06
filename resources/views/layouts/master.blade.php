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
        /**.table-title a {
            font-size: 14px;
            color: #676a6c;
            font-weight: 600;
        }

        .option-buttons{
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

        .options-td .btn{
            width: 85px !important;
        }

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

        #project-buttons-div{
            padding-right: 2px;
        }

        .datepicker {
          z-index: 1600 !important; /* has to be larger than 1050 */
      }

        .wizard-big.wizard > .content{
            min-height: 500px;
        }

        .new-participant{
            display: none;
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

        $.validator.addMethod("time24", function(value, element) {
            return /^(?:[0-5][0-9]):[0-5][0-9]$/.test(value);
        }, "Invalid time format. (mm:ss)");



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
                
                if(currentIndex == 2){

                    console.log($(this).attr('id').indexOf('template') != -1);

                    console.log($(this).serialize());
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

        var participantsTable = $('#add-participants-table').DataTable({
          "columns": [
          { "data": "order" },
          { "data": "name" },
          { "data": "email" },
          { "data": "role" },
          { "data": "status" }
          ],
          "paging": false,
          "ordering": false,
          "lengthChange": false,
          "searching": false,
          "info": false
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
        
        var counter = table.data().length + 1;

        var new_users = [];
        var existing_users = [];

        $('#reference-template').on('change', function(){
            $.get('/templates/components/get/'+this.value, function(data){

                components = data;
                table.rows.add(components).draw(false);
                counter = table.data().length + 1;

                $('#components-json').val(JSON.stringify(components));
            });

            $.get('/templates/details/'+this.value, function(data){

                $('#entry_url').val(data.entry_url);
            });
        });

        if($('#components-json').val()){
            components = JSON.parse($('#components-json').val());
            table.rows.add(components).draw(false);
        }

        $('#add-component-modal').on('show.bs.modal', function(){
            $('#add-component-form #order').val(counter).attr('readonly','readonly');
            $('.scenario-mandatory, .question-mandatory').hide();
        });

        $('#add-project-component-modal').on('show.bs.modal', function(){
            var count = $('#project-components-table').DataTable().data().length + 1;
            $('#add-project-component-form #order').val(count).attr('readonly','readonly');
            $('.scenario-mandatory, .question-mandatory').hide();
        });

        $('#add-template-component-modal').on('show.bs.modal', function(){
            var count = $('#template-components-table').DataTable().data().length + 1;
            $('#add-template-component-form #order').val(count).attr('readonly','readonly');
            $('.scenario-mandatory, .question-mandatory').hide();
        });

        $('#add-participants-modal').on('show.bs.modal', function(){

            var count = participantsTable.data().length + 1;

            if($('#project-participants-table').length == 1){
                count = $('#project-participants-table').DataTable().data().length + 1;
            }

            $('.chosen-select', this).chosen('destroy').chosen();
            $('#add-participants-form')[0].reset();
            $('#add-participants-modal').attr('disabled', false);
            $('.new-participant').hide();
            $('.old-participant').show();
            $("label.error").remove();
            $(".error").removeClass("error");
            $('#add-participants-form #order').val(count).attr('readonly','readonly');
        });

        $('#edit-project-info-modal').on('show.bs.modal', function(){
            $('.date').datepicker({
                todayBtn: "linked",
                format: 'yyyy-mm-dd',
                calendarWeeks: true,
                autoclose: true,
                container: '#edit-project-info-modal modal-body'
            });
        });

        $('#add-component-row-btn').on('click', function (event) {

            event.preventDefault();

            var isValidForm = true;

            $('#add-component-form').validate({
              rules: {
                time_limit: {
                  required: true,
                  time24: true
              },
              order: {
                  required: true,
                  number: true,
                  min: 1,
                  max: 50
                        }
                  }
              }).form();

            isValidForm = $('#add-component-form').valid();
            
            if(isValidForm){

                var component = {
                    "order": counter,
                    "type": $('#add-component-modal #type').val(),
                    "description": $('#add-component-modal #description').val(),
                    "help_text": $('#add-component-modal #help_text').val(),
                    "target": $('#add-component-modal #target').val(),
                    "selections": $('#add-component-modal #selections').val(),
                    "time_limit": $('#add-component-modal #time_limit').val()
                };

                components.push(component);
                
                table.row.add(component).draw(false);

                counter++;

                $('#add-component-form')[0].reset();
                $('#add-component-modal').modal('hide');  

                $('#components-json').val(JSON.stringify(components));
            }

        });

        $('#add-participants-row-btn').on('click',function (event) {

            event.preventDefault();
            event.stopPropagation(); 

            var isValidForm = true;

            $('#add-participants-form').validate({
                    rules: {
                        email: {
                          required: true,
                          email: true,
                          remote: '/users/checkEmail'
                        }
                    }
                  }).form();

            isValidForm = $('#add-participants-form').valid();

            if(isValidForm){
                if($('#add-participants-form').attr('action') == ''){

                    var participant = {
                        "order": participantsTable.data().length + 1,
                        "email": $('#add-participants-modal #email').val(),
                        "status": $('#add-participants-modal #inactive option:selected').text(),
                        "name": $('#add-participants-modal #name option:selected')[0].dataset.name,
                        "role": $('#add-participants-modal #name option:selected')[0].dataset.userrole
                    };

                    if($('#add-participants-modal #new_user').is(':checked')){

                        participant.first_name = $('#add-participants-modal #first_name').val();
                        participant.last_name = $('#add-participants-modal #last_name').val();
                        participant.middle_name = $('#add-participants-modal #middle_name').val() + ', ' + $('#add-participants-modal #first_name').val();
                        participant.name = $('#add-participants-modal #last_name').val() + ', ' + $('#add-participants-modal #first_name').val();

                        participant.gender = $('#add-participants-modal #gender').val();


                        participant.role = 'Test Participant';

                        new_users.push(participant);
                    } else{

                        existing_users.push($('#add-participants-modal #name option:selected')[0].dataset.userid);
                    }

                    participantsTable.row.add(participant).draw(false);


                    if($('.chosen-select option:selected').length > 1){

                        $('.chosen-select option:selected').attr("disabled",true);

                        $('.chosen-select').trigger('chosen:updated');

                    }
                    

                    $('#add-participants-form')[0].reset();

                    $('#add-participants-modal').modal('hide');  

                } else{

                    $('#selected_users').val($(".chosen-select").val());
                    $('#add-participants-form').submit();
                }
            }

            $('#existing_users').val(JSON.stringify(existing_users));
            $('#new_users').val(JSON.stringify(new_users));
        });

        $('#add-component-modal #type, #add-project-component-modal #type, #add-template-component-modal #type, #edit-project-component-form #type, #edit-template-component-form #type').on('change', function(){
            
            if(this.value == 'Question'){
                $('.scenario-mandatory').hide();
                $('.question-mandatory').show();
            } 

            if(this.value == 'Scenario'){
                $('.question-mandatory').hide();
                $('.scenario-mandatory').show();
            }
        }); 

        $('.cancel-btn').on('click', function(event){
            event.preventDefault();
            window.history.back();
        });

        $('#add-project-component-form, #add-template-component-form').validate({
              rules: {
                time_limit: {
                  required: true,
                  time24: true
              },
              order: {
                  required: true,
                  number: true,
                  min: 1,
                  max: 50
                        }
                  }
              });

        $('#new_user').on('click', function(){
            $('.new-participant').toggle();
            $('.old-participant').toggle();
            $('#add-participants-modal #email').attr('disabled', false).val('');
            $('#add-participants-modal #name_chosen span').text('Select Participants');
            $('#add-participants-modal #name_chosen a').addClass('chosen-default');
        });

        /**$('#add-participants-form').submit().on('show.bs.modal', function(event) {
            // prevent datepicker from firing bootstrap modal "show.bs.modal"
            event.stopPropagation(); 
        });**/

        $('#add-participants-modal .chosen-select').on('change', function(){
            
            $('#add-participants-modal #email').val($(this).find(':selected').data('email')).attr('disabled', true);

            $('#name_chosen span').text($(this).find(':selected').data('name'));
        });
        
    });

</script>

</body>

</html>

<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">
    <head>
        <title>Integer manipulation</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    </head>
    <body>
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="inner-box">
                    <div class="content">
                        <div class="header">
                            <p class="lead">Integer manipulation</p>
                        </div>
                        <form action="#" method="post" name="frm-calc" id="frm-calc">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inpt-calc" name="inpt-calc" placeholder="Please enter numbers only" data-validation="required custom" data-validation-regexp="^[1-9][0-9]*$" data-validation-error-msg-required="This field is required" data-validation-error-msg-custom="Invalid number..! Please enter positive integers">
                            </div>
                            <div class="form-group">
                                <label id="result"></label>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="btn1" name="btn1">Calculate Odd Numbers</button>
                                <button type="button" class="btn btn-success" id="btn2" name="btn2">Calculate Even Numbers</button>
                                <button type="button" class="btn btn-warning" id="btn3" name="btn3">Calculate Sum</button>
                            </div>
                        </form> 
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--JQuery form validator-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    </body>
</html>
<script>
    $(document).ready(function () {
        /*
         * Initialize validation library
         */
        $.validate({
            form: '#frm-calc'
        });

        /*
         * Hide result lable on page load
         */
        $('#result').hide();
        
        /*
         * Clear input
         */
        $('#inpt-calc').val('');

        /*
         * Send ajax request to calculate function
         */
        $('#frm-calc :button').on('click', function () {
            if ($('#frm-calc').isValid()) {
                var input_number = $('#inpt-calc').val();
                var button_type = $(this).get(0).id;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('calculate'); ?>",
                    data: {'input_number': input_number, 'type': button_type},
                    success: function (results) {
                        $('#result').show().html('Total: ' + results);
                    }
                });
            } else {
                $('#result').hide();
            }
        });
    });
</script>
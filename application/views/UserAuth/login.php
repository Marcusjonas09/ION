<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FEUTECH</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="http://fcis.feutech.edu.ph/assets/img/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url() ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>bower_components/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>bower_components/ionicons-2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/skins/skin-green.css">
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/override.css?date=577d89ebe25ec3af2b99d89af4ebac57">
</head>
<?php if ($error) : ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Login Error!</h4>
        <p><?php echo $error; ?></p>
    </div>
<?php endif; ?>

<body style="overflow:hidden;" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p class="text-center"><img src="http://fcis.feutech.edu.ph/assets/img/itamaraws.png" width="220" /></p>
            <p class="login-box-msg">
                FEUTECH iON <br /><span class="login-app">
                </span>
            </p>

            <form action="<?= base_url() ?>UserAuth/login" method="post" accept-charset="utf-8">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="acc_number" placeholder="Student Number" value="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="acc_password" placeholder="Portal Password" value="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            &nbsp;
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat" onclick="showAlert()"> Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        if ($('form').length > 0) {
            $('form').attr('autocomplete', 'off');
        }

        if ('' == 'walkin') {
            var idleTime = 0;

            $(document).ready(function() {

                var idleInterval = setInterval(timerIncrement, (60000 * 5)); // 1 minute

                $(this).mousemove(function(e) {
                    idleTime = 0;
                });
                $(this).keypress(function(e) {
                    idleTime = 0;
                });
            });

            function timerIncrement() {
                idleTime = idleTime + 5;
                if (idleTime > 1) {
                    $("body").addClass("loading-modal");
                    alert('You have been logoff due to inactivity!');
                    window.location.href = "http://fcis.feutech.edu.ph//login/destroy";
                }
            }
        }

        $(document).keydown(function(event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            }
        });
    </script>
</body>

</html>
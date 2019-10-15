<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FEUTECH</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="http://fcis.feutech.edu.ph/assets/img/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/plugins/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/plugins/ionicons-2.0.1/css/ionicons.min.css">

    <!-- <link href="http://fcis.feutech.edu.ph/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="http://fcis.feutech.edu.ph/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <link href="http://fcis.feutech.edu.ph/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- Theme style -->
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/skins/skin-green.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://fcis.feutech.edu.ph/assets/js/html5shiv.min.js"></script>
        <script src="http://fcis.feutech.edu.ph/assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://fcis.feutech.edu.ph/assets/css/override.css?date=577d89ebe25ec3af2b99d89af4ebac57">
</head>
<?php if ($error) : ?>
    <!-- <div class="alert alert-warning alert-dismissible" role="alert" style="postition:absolute; z-index:9999;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong></strong>
    </div> -->
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
                    <!-- Online Petition -->
                </span>
            </p>

            <form action="<?= base_url() ?>UserAuth/login" method="post" accept-charset="utf-8">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="acc_number" placeholder="Student Number" value="">
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="acc_password" placeholder="Portal Password" value="">
                    <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
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

    <script src="http://fcis.feutech.edu.ph/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/fastclick/fastclick.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/js/app.min.js"></script> -->

    <script src="http://fcis.feutech.edu.ph/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/jquery.countdown-2.1.0/jquery.countdown.js?v=577d89ebe25ec3af2b99d89af4ebac57" type="text/javascript"></script>
    <script src="http://fcis.feutech.edu.ph/assets/plugins/LazyLoad/lazy.js" type="text/javascript"></script>

    <script>
        if ($('form').length > 0) {
            $('form').attr('autocomplete', 'off');
        }

        if ($('.btn-loading').length > 0) {
            $('.btn-loading').click(function() {
                $("body").addClass("loading-modal");
            });
        }

        if ($('.select2').length > 0) {
            $(".select2").select2();
        }

        if ($('#date_schedules').length > 0) {
            $('#date_schedules').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                //startDate: '-0d',
                todayHighlight: true
            });
        }



        $('.textarea').wysihtml5({
            toolbar: {
                "font-styles": false,
                "emphasis": false,
                "lists": false,
                "html": false,
                "link": false,
                "image": false,
                "color": false,
                "blockquote": false
            }
        });

        if ($('#date_start').length > 0) {
            $('#date_start').datepicker({
                autoclose: true
            });
        }

        if ($('#date_end').length > 0) {
            $('#date_end').datepicker({
                autoclose: true
            });
        }

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        if ($('.btn-confirm').length > 0) {
            $(".btn-confirm").click(function(event) {
                if (!confirm('Are you sure that you want to submit the form')) {
                    event.preventDefault();
                    $("body").removeClass("loading-modal");
                }
            });
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
    <!-- <p class="text-center text-muted" style="font-size:12px; color: #286230;">2019-05-22 12:43:55 == 2019-05-22 12:48:38</p> -->
</body>

</html>
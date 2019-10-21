</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<!-- page script -->
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script src="<?= base_url() ?>dist/js/timestamp-tag.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var pusher = new Pusher('8a5cfc7f91e3ec8112f4', {
            cluster: 'ap1',
            forceTLS: true,
        });

        var channel = pusher.subscribe('my-channel');
        var student_number = <?= $this->session->acc_number ?>;
        channel.bind('school_announcement', function(data) {
            var obj = JSON.parse(JSON.stringify(data));
            // $("#dash").fadeIn(1000).html(
            //     "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + obj.message
            // );
            // $.get("<?= base_url() ?>Student/get_notifications", function(data) {
            //         $("#notif_badge").text(data));
            // });
        });

        channel.bind('client_specific', function(data) {
            var obj = JSON.parse(JSON.stringify(data));
            for (var i = 0; i < obj.recipient.length; i++) {
                if (student_number == obj.recipient[i]) {
                    $("#client").fadeIn(1000).html(
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + obj.message
                    );
                }
            }
        });

        $('#notif_active').click(function() {
            $.get("<?= base_url() ?>Notification/get_notifications", function(data) {
                var obj = JSON.parse(data);
                obj.notifications.forEach(get_notif);
            });
        });

        function get_notif(notif, index) {
            var content = notif.notif_content;
            var time_posted = notif.notif_created_at;
            var element = "<li><a href='#'><div class='pull-left'><img src='<?= base_url() ?>dist/img/default_avatar.png' class='img-circle' alt='User Image'></div><h4>Support Team<small class='timestamp' timeago='true' format='l dS /o/f F Y h:i:s A' title-format='d:m:Y h:i:s'>" + time_posted + "</small></h4><p>" + content + "</p></a><li>"
            $("#notif_container").append(
                element
            );
            // var txt2 = $("<p></p>").text("Text.");
            // var li = '<tr><td class="col-md-2 text-center">' + day + '</td><td class="col-md-7">' + start_time + ' - ' + end_time + '</td><td class="col-md-3">' + room + '</td></tr>';
            // $("#notif_container").append(li);
        }

        // function load_notification() {
        //     $.get("<?= base_url() ?>Notification/get_notifications", function(data) {
        //         alert(data.notifications.length);
        //         // for (var i = 0; i < data.notifications.length; i++) {}
        //         // for (var i = 0;)
        //         //     var li = '<tr><td class="col-md-2 text-center">' + day + '</td><td class="col-md-7">' + start_time + ' - ' + end_time + '</td><td class="col-md-3">' + room + '</td></tr>';
        //         // $("#notif_container").append(li);
        //     });
        // }

        // 



        //fetch specific notification
        setInterval(() => {
            $.get("<?= base_url() ?>Notification/get_notif_badge", function(data) {
                $('#notif_badge').text(data);
            });
        }, 1000);

        $('.js-example-basic-single').select2();

    });
</script>


<script type="text/javascript">
    var progress = "<?php echo $totalunitspassed / $totalunits; ?>";
    var bar = new ProgressBar.Circle(container, {
        color: '#1f5',
        strokeWidth: 10,
        trailWidth: 7,
        easing: 'easeInOut',
        duration: 2000,
        text: {
            autoStyleContainer: false
        },
        from: {
            color: '#1f5',
            width: 10
        },
        to: {
            color: '#1f5',
            width: 10
        },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value + '%');
            }

        }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(progress); // Number from 0.0 to 1.0
</script>

</body>

</html>
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
            $("#dash").fadeIn(1000).html(
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>" + obj.message
            );
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

        //fetch specific notification

        setInterval(() => {
            $.get("http://localhost/ION/Student/get_notifications", function(data) {
                $("#petition_number").text(data);
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
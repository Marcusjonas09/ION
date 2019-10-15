</div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- page script -->
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- <script>
    $(document).ready(function() {
        $.get("http://192.168.43.111/ION/Services/fetchAnnouncements", function(data, status) {
            var sample = data['post_caption'];
            alert("Data: " + sample + "\nStatus: " + status).delay(100);
        });
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#petitionTable').dataTable({
            "bSort": false
        });

        $('.js-example-basic-single').select2();
    });
</script>


<script type="text/javascript">
    var progress = "<?php echo $totalunitspassed / $totalunits; ?>";
    var bar = new ProgressBar.Circle(container, {
        color: '#1f5',
        // This has to be the same size as the maximum width to
        // prevent clipping
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
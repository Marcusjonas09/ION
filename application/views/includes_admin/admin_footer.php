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
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- Pusher JS -->

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize variables
        var schedule_entry, sched_table = [],
            inner_sched = [];

        $("#add_sched").click(function() {
            var day = $("#sched_day").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var room = $("#room").val();
            schedule_entry = {
                day: day,
                start_time: start_time,
                end_time: end_time,
                room: room,
            };

            if (start_time < end_time && start_time != end_time) {
                sched_table.push(schedule_entry);
                var tr = '<tr><td class="col-md-2 text-center">' + day + '</td><td class="col-md-7">' + start_time + ' - ' + end_time + '</td><td class="col-md-3">' + room + '</td></tr>';
                $("#sched_table_body").append(tr); // Append new elements
            }


            for (var k in sched_table) {
                inner_sched = sched_table[k];
            }
            for (var k in inner_sched) {
                console.log(inner_sched[k]);
            }
        });
        // Create a new object

        $('.timepicker').timepicker({
            showInputs: false
        })
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>
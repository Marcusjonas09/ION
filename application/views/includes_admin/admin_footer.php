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
            petition_details = [];

        // fetch data using ajax

        setInterval(() => {
            $.get("http://localhost/ION/Admin/petitions_number", function(data) {
                $("#petition_number").text(data)
            });
            $.get("http://localhost/ION/Admin/underload_number", function(data) {
                $("#underload_number").text(data)
            });
            $.get("http://localhost/ION/Admin/overload_number", function(data) {
                $("#overload_number").text(data)
            });
            $.get("http://localhost/ION/Admin/simul_number", function(data) {
                $("#simul_number").text(data)
            });
        }, 1000);

        // fetch Petition Details

        var course_code = $("#offering_course_code").val();
        var course_section = $("#offering_course_section").val();

        offering_entry = {
            offering_course_code: course_code,
            offering_course_section: course_section
        };
        petition_details.push(offering_entry);

        // add schedule

        $("#add_sched").click(function() {
            var day = $("#sched_day").val();
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var room = $("#room").val();

            schedule_entry = {
                day: day,
                start_time: start_time,
                end_time: end_time,
                room: room
            };

            if (start_time < end_time && start_time != end_time) {
                sched_table.push(schedule_entry);
                var tr = '<tr><td>' + sched_table.indexOf(schedule_entry) + '</td><td class="col-md-2 text-center">' + day + '</td><td class="col-md-7">' + start_time + ' - ' + end_time + '</td><td class="col-md-3">' + room + '</td></tr>';
                $("#sched_table_body").append(tr);
            }
        });

        //save schedule

        $("#save_sched").click(function() {
            $.post("http://localhost/ION/Admin/save_sched", {
                    course_details: petition_details,
                    course_sched: sched_table
                }).done(function(data) {
                    alert("success " + data);
                })
                .fail(function() {
                    alert("Petition approval failed!");
                });
        });

        $('.timepicker').timepicker({
            showInputs: false
        })
    });
</script>

</body>

</html>
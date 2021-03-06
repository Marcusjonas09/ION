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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<!-- Pusher JS -->

<!-- DataTables -->
<script src="<?= base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    function delete_program(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_program/" + id)
            }
        })
    }

    function delete_college(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_college/" + id)
            }
        })
    }

    function delete_course(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_course/" + id)
            }
        })
    }

    function delete_laboratory(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_laboratory/" + id)
            }
        })
    }

    function delete_section(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_section/" + id)
            }
        })
    }

    function delete_department(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_department/" + id)
            }
        })
    }

    function delete_specialization(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_specialization/" + id)
            }
        })
    }

    function delete_curriculum(id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_curriculum/" + id)
            }
        })
    }

    function delete_course_from_curriculum(id, curr_id) {
        var baselink = "<?= base_url() ?>";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(baselink + "SuperAdmin/delete_course_from_curriculum/" + id + "/" + curr_id)
            }
        })
    }

    $(document).ready(function() {

        $('.datatables').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });

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
        $('.js-example-basic-single').select2();
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>
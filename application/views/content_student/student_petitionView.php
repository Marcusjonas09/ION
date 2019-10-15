<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a class="navi" href="<?= base_url() ?>Student/petitions"><span class="fa fa-chevron-left"></span>&nbsp&nbsp<strong>Back</strong></a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Table showing all petitions related to this student account -->


        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-header">
                    <h4><strong>Petition Status: </strong>
                        <?php if ($petition->petition_status == 1) {
                            echo "<span class='label label-success'>Approved</span>";
                        } elseif ($petition->petition_status == 2) {
                            echo "<span class='label label-warning'>Pending</span>";
                        } else {
                            echo "<span class='label label-danger'>Denied</span>";
                        } ?></h4>
                </div>
                <div class="box-body">
                    <div class="container-fluid col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Course Code: </label>
                                    <input readonly type="text" class="form-control" value="<?= $petition->course_code ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Section</label>
                                    <input readonly type="text" class="form-control" placeholder="Course section">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date: </label>
                                    <input name="date_submitted" type="text" class="form-control" readonly value="<?= date("F j, Y, g:i a", $petition->date_submitted) ?>">
                                    <input name="date_processed" type="hidden" class="form-control" readonly value="<?= time() ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Description</label>
                                    <?php foreach ($courses as $course) : ?>
                                        <?php if ($petition->course_code == $course->course_code) : ?>
                                            <input readonly type="text" class="form-control" placeholder="Course description" value="<?= $course->course_title ?>">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><strong>Schedule</strong></h3>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Time</label>
                                <input readonly type="text" class="form-control" placeholder="Time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Day</label>
                                <input readonly type="text" class="form-control" placeholder="Day">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room</label>
                                <input readonly type="text" class="form-control" placeholder="Room">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Faculty</label>
                                    <input readonly type="text" class="form-control" placeholder="Faculty">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><strong>Petitioners</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Student Number</th>
                            <th>Student Name</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($petitioners as $petitioner) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $petitioner->stud_number ?></td>
                                    <td><?= $petitioner->acc_fname . ' ' . $petitioner->acc_lname ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
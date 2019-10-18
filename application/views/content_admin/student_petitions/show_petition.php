<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a class="navi" href="<?= base_url() ?>Admin/course_petitions"><span class="fa fa-chevron-left"></span></a>&nbsp&nbsp<strong>Petition Form</strong>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>Admin/course_petitions"><i class="fa fa-dashboard"></i>Course Petitions</a></li>
            <li class="active">Petition</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="col-md-6">
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
                        <input name="petition_id" type="hidden" class="form-control" value="<?= $petition->petition_ID ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Course Code: </label>
                                    <input id="offering_course_code" readonly type="text" class="form-control" value="<?= $petition->course_code ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date submitted: </label>
                                    <input type="text" class="form-control" readonly value="<?= date("F j, Y, g:i a", $petition->date_submitted) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Section</label>
                                    <input id="offering_course_section" readonly type="text" class="form-control" placeholder="Course section">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date processed: </label>
                                    <input type="text" class="form-control" readonly value="<?php if ($petition->date_processed) {
                                                                                                echo date("F j, Y, g:i a", $petition->date_processed);
                                                                                            } else {
                                                                                                echo "Pending";
                                                                                            } ?>">
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

                        <?php if ($petition->petition_status == 1 || $petition->petition_status == 0) : ?>
                            <a href="#" class="btn btn-success btn-sm rounded pull-right disabled" style="margin-right:10px;"><span class="fa fa-check"></span>&nbsp Approve</a>
                            <a href="#" class="btn btn-danger btn-sm rounded pull-right disabled" style="margin-right:10px;"><span class="fa fa-ban"></span>&nbsp Decline</a>
                        <?php else : ?>
                            <!-- <button class="btn btn-success btn-sm rounded pull-right " type="submit" value="submit"><span class="fa fa-check"></span>&nbsp Approve</button> -->
                            <a href="<?= base_url() ?>Admin/approve_petition/<?= $petition->petition_ID ?>/<?= time() ?>" class="btn btn-success btn-sm rounded pull-right" style="margin-right:10px;"><span class="fa fa-check"></span>&nbsp Approve</a>
                            <a href="<?= base_url() ?>Admin/decline_petition/<?= $petition->petition_ID ?>/<?= time() ?>" class="btn btn-danger btn-sm rounded pull-right" style="margin-right:10px;"><span class="fa fa-ban"></span>&nbsp Decline</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>

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

        <div class="col-md-6">
            <div class="box box-success">

                <div class="box-header">
                    <h3 class="box-title"><strong>Schedule</strong></h3>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Faculty</label>
                                <input type="text" class="form-control" placeholder="Faculty" value="TBA">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color:#00a65a; color:white;">
                            <th class="text-center col-md-2">index</th>
                            <th class="text-center col-md-2">Day</th>
                            <th class="col-md-7">Time</th>
                            <th class="col-md-3">Room</th>
                        </thead>
                        <tbody id="sched_table_body">
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Day</label>
                                <select id="sched_day" id="" class="form-control">
                                    <option value="M">Monday</option>
                                    <option value="T">Tuesday</option>
                                    <option value="W">Wednesday</option>
                                    <option value="TH">Thursday</option>
                                    <option value="F">Friday</option>
                                    <option value="S">Saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class="input-group">
                                    <input id="start_time" type="text" value="" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Room</label>
                                <input id="room" type="text" class="form-control" placeholder="Room" value="TBA">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Time</label>
                                <div class="input-group">
                                    <input id="end_time" type="text" value="" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pull-right">
                                <button id="save_sched" class="btn btn-success">Save Schedule</button>
                            </div>
                            <div class="form-group pull-right">
                                <button id="add_sched" class="btn btn-primary">Add Schedule</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
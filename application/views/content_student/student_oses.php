<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Enrollment</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <strong>Available Courses</strong>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table text-center">
                        <thead>
                            <th>course</th>
                            <th>Section</th>
                            <th>Slots</th>
                            <th>Units</th>
                            <th>Days</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                            <?php foreach ($offering as $of) : ?>
                                <tr>
                                    <td><?= $of->course_code ?></td>
                                    <td><?= $of->course_section ?></td>
                                    <td><?= $of->course_slot ?></td>
                                    <td></td>
                                    <td>
                                        <?php foreach ($offeringSched as $ofs) : ?>
                                            <?php if ($of->course_code == $ofs->root_course && $of->course_section == $ofs->root_section) : ?>
                                                <?= $ofs->sched_day ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>

                                    <td>

                                        <?php foreach ($offeringSched as $ofs) : ?>
                                            <?php if ($of->course_code == $ofs->root_course && $of->course_section == $ofs->root_section) : ?>
                                                <?= $ofs->sched_start . ' - ' . $ofs->sched_end . ' / ' ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull right" style="margin-left:10px;">Add Course</button>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <strong>Registered Courses</strong>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <th>-</th>
                            <th>Section</th>
                            <th>Slots</th>
                            <th>Units</th>
                            <th>Days</th>
                            <th>Time</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-danger pull right" style="margin-left:10px;">Delete Course</button>
                    <button type="submit" class="btn btn-success pull right" style="margin-left:10px;">Preview SAF</button>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
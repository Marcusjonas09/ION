<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Overload</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-success">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h4><strong>Term: School Year: </strong></h4>
                <!-- <?php if ($course_card) : ?>
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-success" style="background-color:#00a65a; color:white;">
                            <th class="text-center col-md-1">COURSE</th>
                            <th class="text-center col-md-7">COURSE TITLE</th>
                            <th class="text-center col-md-1">SECTION</th>
                            <th class="text-center col-md-1">UNITS</th>
                            <th class="text-center col-md-1">MIDTERM</th>
                            <th class="text-center col-md-1">FINAL</th>
                        </thead>
                        <tbody>
                            <?php foreach ($course_card as $record) : ?>
                                <?php if ($record->cc_is_enrolled == true) : ?>
                                    <tr>
                                        <td><?= strtoupper($record->cc_course) ?></td>
                                        <td>
                                            <?php if (strtoupper($record->cc_course) == strtoupper($record->course_code)) {
                                                            echo strtoupper($record->course_title);
                                                        } else if (strtoupper($record->cc_course) == strtoupper($record->laboratory_code)) {
                                                            echo strtoupper($record->laboratory_title);
                                                        } else {
                                                            echo '';
                                                        } ?>
                                        </td>
                                        <td></td>
                                        <td class="text-center"><?php if (strtoupper($record->cc_course) == strtoupper($record->course_code)) {
                                                                                echo strtoupper($record->course_units);
                                                                            } else if (strtoupper($record->cc_course) == strtoupper($record->laboratory_code)) {
                                                                                echo strtoupper($record->laboratory_units);
                                                                            } else {
                                                                                echo '';
                                                                            } ?></td>
                                        <td class="text-center"><?= $record->cc_midterm ?></td>
                                        <td class="text-center"><?= $record->cc_final ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?> -->
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
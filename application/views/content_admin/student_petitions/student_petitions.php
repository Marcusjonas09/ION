<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Course Petitions</strong>
            <small>Administrator</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">Course Petitions</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Table showing all petitions related to this student account -->

        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">My Petitions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped text-center">
                    <thead>
                        <th>Course</th>
                        <th>Course Title</th>
                        <th>Date Posted</th>
                        <th>Signees</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($petitions as $petition) : ?>
                            <tr>
                                <td><?= $petition->course_code ?></td>
                                <td>
                                    <?php foreach ($courses as $course) : ?>
                                        <?php if ($petition->course_code == $course->course_code) : ?>
                                            <?= $course->course_title ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= date("F j, Y - g:i a", $petition->date_submitted) ?></td>
                                <td>
                                    <?php $i = 0; ?>
                                    <?php foreach ($petitioners as $petitioner) {
                                            if ($petitioner->petition_unique == $petition->petition_unique) {
                                                $i++;
                                            }
                                        } ?>
                                    <?= $i ?>
                                </td>
                                <td>
                                    <?php if ($petition->petition_status == 1) {
                                            echo "<span class='label label-success'>Approved</span>";
                                        } elseif ($petition->petition_status == 2) {
                                            echo "<span class='label label-warning'>Pending</span>";
                                        } else {
                                            echo "<span class='label label-danger'>Denied</span>";
                                        } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>Admin/show_petition/<?= $petition->petition_ID ?>/<?= $petition->petition_unique ?>" class="btn btn-warning btn-sm rounded"><i class="fa fa-eye"></i> View</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="col-md-6"><?= $this->pagination->create_links(); ?></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
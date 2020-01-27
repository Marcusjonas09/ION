<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong><a class="navi" href="<?= base_url() ?>SuperAdmin/courses"><span class="fa fa-chevron-left"></span>&nbsp&nbspBack</a></strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success_msg)) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i>Success!</h4>
                <?php echo $success_msg; ?>
            </div>
        <?php endif; ?>
        <div class="container-fluid col-md-9" style="padding-right:0px;">
            <form action="<?= base_url() ?>SuperAdmin/edit_course_function" method="post">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Edit course</strong></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="course_code">Course Code:</label>
                                <input class="form-control" type="text" name="course_code" id="course_code" value="<?= $course->course_code ?>" placeholder="Enter course code" required />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="course_units">Units:</label>
                                <input class="form-control" type="number" name="course_units" id="course_units" value="<?= $course->course_units ?>" placeholder="Enter units" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="laboratory_code">Laboratory Code:</label>
                                <select class="form-control js-example-basic-single" name="laboratory_code" id="laboratory_code">
                                    <?php foreach ($laboratories as $laboratory) : ?>
                                        <option <?php if ($laboratory->laboratory_code == $course->laboratory_code) {
                                                    echo "selected";
                                                } ?> value="<?= $laboratory->laboratory_code ?>"><?= $laboratory->laboratory_code . ' - ' . $laboratory->laboratory_title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="course_title">Course Title:</label>
                                <input class="form-control" type="text" name="course_title" id="course_title" value="<?= $course->course_title ?>" placeholder="Enter course title" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department_code">Department:</label>
                                <select class="form-control js-example-basic-single" name="department_code" id="department_code">
                                    <?php foreach ($departments as $department) : ?>
                                        <option <?php if ($department->department_code == $course->department_code) {
                                                    echo "selected";
                                                } ?> value="<?= $department->department_code ?>"><?= $department->department_code . ' - ' . $department->department_description ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="course_id" value="<?= $course->course_id ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-success pull-right" type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
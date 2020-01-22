<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong><a class="navi" href="<?= base_url() ?>Superadmin/student"><span class="fa fa-chevron-left"></span>&nbsp&nbsp</a>Add Student Entry</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container-fluid col-md-8" style="padding-right:0px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Insert Single Entry</strong></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-10">
                            <label for="curr_code">Student Number:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Student Number">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">First Name:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter first name">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">Middle Name:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter Middle Name">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">Last Name:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter Last name">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">Program:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter program">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">College:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter college">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="curr_code">Curriculum:</label>
                            <input class="form-control" type="text" name="curr_code" id="curr_code" placeholder="Enter curriculum code">
                        </div>
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-success pull-right" type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Upload CSV file</strong></h3>
                </div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input class="btn btn-default" type="file" name="facultycsv" />
                    </form>
                </div>
                <div class="box-footer">
                    <input class="btn btn-success pull-right" type="submit" value="Import" />
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Students</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container-fluid">
            <table class="datatables table table-bordered text-center" data-page-length='10'>
                <thead class="bg-success" style="background-color:#00a65a; color:white;">
                    <th class="text-center col-md-4">Curriculum Code</th>
                    <th class="text-center col-md-4">Curriculum Description</th>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="container-fluid col-md-4" style="padding:0px;">
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
            <div class="container-fluid col-md-8" style="padding-right:0px;">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>Insert Single Entry</strong></h3>
                    </div>
                    <div class="box-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="curr_code">Curriculum Code</label>
                                <input class="form-control" type="text" name="curr_code" id="curr_code">
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-success pull-right" type="submit" value="Save" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
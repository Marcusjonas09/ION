<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a class="navi" href="<?= base_url() ?>SuperAdmin/school_parameters"><span class="fa fa-chevron-left"></span>&nbsp&nbsp<strong>Back</strong></a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="container-fluid" style="padding:0px;">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>Program</strong>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="datatables table table-striped" data-page-length='10'>
                        <thead class="bg-success text-center" style="background-color:#00a65a; color:white;">
                            <th class="text-center col-md-1">Student No</th>
                            <th class="text-center col-md-3">Full Name</th>
                            <th class="text-center col-md-1">Program</th>
                            <th class="text-center col-md-2">College</th>
                            <th class="text-center col-md-2">Curriculum</th>
                            <th class="text-center col-md-2">Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a class="btn btn-success pull-right" href="<?= base_url() ?>SuperAdmin/add_student">Add New Entry</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
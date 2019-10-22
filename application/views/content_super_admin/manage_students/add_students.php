<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>Add Student</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">STUDENT DETAILS</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">STUD NUMBER</label>

                            <div class="col-sm-8">
                                <input name="acc_number" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">FIRST NAME</label>

                            <div class="col-sm-8">
                                <input name="acc_fname" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">MIDDLE NAME</label>

                            <div class="col-sm-8">
                                <input name="acc_mname" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">LAST NAME</label>

                            <div class="col-sm-8">
                                <input name="acc_lname" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">CITIZENSHIP</label>

                            <div class="col-sm-8">
                                <input name="acc_citizenship" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">COLLEGE</label>

                            <div class="col-sm-8">
                                <select name="acc_college" class="form-control js-example-basic-single">
                                    <option value="COMPUTER STUDIES">COMPUTER STUDIES</option>
                                    <option value="ENGINEERING">ENGINEERING</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">PROGRAM</label>

                            <div class="col-sm-8">
                                <select name="acc_program" class="form-control js-example-basic-single">
                                    <option value="">BSIT-WMA</option>
                                    <option value="">BSIT-DA</option>
                                    <option value="">BSIT-AGD</option>
                                    <option value="">BSIT-SMBA</option>
                                    <option value="">BSCS-SE</option>
                                    <option value="">BSCS-BA</option>
                                    <option value="">BSEMC-DA</option>
                                    <option value="">BSEMC-AGD</option>
                                    <option value="">BSCE-SE</option>
                                    <option value="">BSCE-WRE</option>
                                    <option value="">BSCpE</option>
                                    <option value="">BCSEE-PSP</option>
                                    <option value="">BCSEE-EE</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">CURRICULUM CODE</label>

                            <div class="col-sm-8">
                                <input name="curriculum_code" type="text" class="form-control">
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">SAVE</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
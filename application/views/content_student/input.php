<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>input</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div id='div1'></div>
        <div class="col-md-6">
            <form action="<?= base_url() ?>/Student/entergrade" method="post">
                <div class="form-group">
                    <label>Year</label>
                    <input value="20162017" name="year" class="form-control" type="number">
                </div>

                <div class="form-group">
                    <label>Term</label>
                    <input value="1" name="term" class="form-control" type="number">
                </div>
                <div class="form-group">
                    <label>Student Number</label>
                    <input name="stud" class="form-control" type="number" value="<?= $this->session->acc_number ?>" placeholder="Student Number">
                </div>
                <div class="form-group">
                    <label>Course Code</label>
                    <input name="course" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Midterm</label>
                    <select name="mid" class="form-control">
                        <option value="0.5">0.5</option>
                        <option value="1.0">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Final</label>
                    <select name="final" class="form-control">
                        <option value="0.5">0.5</option>
                        <option value="1.0">1.0</option>
                        <option value="1.5">1.5</option>
                        <option value="2.0">2.0</option>
                        <option value="2.5">2.5</option>
                        <option value="3.0">3.0</option>
                        <option value="3.5">3.5</option>
                        <option value="4.0">4.0</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Final</label>
                    <select name="status" class="form-control">
                        <option value="credited">credited</option>
                        <option value="finished">finished</option>
                        <option value="unfinished">unfinished</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit" value="submit"><strong>Save</strong></button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
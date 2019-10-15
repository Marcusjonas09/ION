  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <strong>Load Revision</strong>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

          <div class="col-md-12">
              <!-- Employee Details Box -->
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Student Information</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <table class="table">
                          <tr>
                              <th>STUDENT NO.</th>
                              <th>NAME</th>
                              <th>PROGRAM</th>
                              <th>TERM/YEAR</th>
                          </tr>

                          <tr>
                              <td><?= $this->session->acc_number ?></td>
                              <td><?= $this->session->Firstname . ' ' . $this->session->Lastname ?></td>
                              <td></td>
                              <td></td>
                          </tr>
                      </table>
                      <br />
                      <div class="col-md-6">
                          <!-- Employee Details Box -->
                          <div class="box box-success">
                              <div class="box-header with-border">
                                  <h3 class="box-title">COURSE TO BE DELETED</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table">
                                      <th>COURSE CODE</th>
                                      <th>UNITS</th>
                                      <th>SECTION</th>
                                      <th>DAY</th>
                                      <th>TIME</th>
                                      <th>ROOM</th>
                                  </table>

                              </div>
                              <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                      </div>
                      <div class="col-md-6">
                          <!-- Employee Details Box -->
                          <div class="box box-success">
                              <div class="box-header with-border">
                                  <h3 class="box-title">COURSE TO ADD</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table">
                                      <th>COURSE CODE</th>
                                      <th>UNITS</th>
                                      <th>SECTION</th>
                                      <th>DAY</th>
                                      <th>TIME</th>
                                      <th>ROOM</th>
                                  </table>
                              </div>
                              <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                      </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <button type="submit" class="btn btn-success pull-right" style="margin-left:10px;">Submit</button>
                      <button type="submit" class="btn btn-default pull-right">Cancel</button>
                  </div>
                  <!-- /.box-footer -->
              </div>
              <!-- /.box -->
          </div>

  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
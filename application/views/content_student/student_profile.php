  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <strong>Student Profile</strong>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
          <div class="col-md-12">
              <!-- Profile Image -->
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">My Information</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-4">
                              <img class="col-md-12" src="<?= base_url() ?>dist/img/default_avatar.png" alt="User profile picture">
                          </div>
                          <div class="col-md-4">
                              <table class="table">
                                  <tr>
                                      <td><strong class="pull-right">Student Number : </strong></td>
                                      <td><?= $account->acc_number ?></td>
                                  </tr>

                                  <tr>
                                      <td><strong class="pull-right">Name : </strong></td>
                                      <td><?= $account->acc_fname . ' ' . $account->acc_mname . ' ' . $account->acc_lname ?></td>
                                  </tr>

                                  <tr>
                                      <td><strong class="pull-right">Citizenship : </strong></td>
                                      <td><?= $account->acc_citizenship ?></td>
                                  </tr>

                                  <tr>
                                      <td><strong class="pull-right">Program : </strong></td>
                                      <td><?= $account->acc_program ?></td>
                                  </tr>

                                  <tr>
                                      <td><strong class="pull-right">College : </strong></td>
                                      <td><?= $account->acc_college ?></td>
                                  </tr>

                                  <tr>
                                      <td><strong class="pull-right">Curriculum Code : </strong></td>
                                      <td><?= $account->curriculum_code ?></td>
                                  </tr>
                              </table>
                          </div>
                      </div>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
          <!-- <div class="col-md-12">
              Account Profile Box
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Change Password</h3>
                  </div>
                  /.box-header
                  <div class="box-body">
                      <form role="form">
                          <div class="box-body">
                              <div class="form-group">
                                  <label for="CurrentPass">Current Password</label>
                                  <input type="password" class="form-control" id="CurrentPass" placeholder="Current Password">
                              </div>
                              <div class="form-group">
                                  <label for="NewPass">New Password</label>
                                  <input type="password" class="form-control" id="NewPass" placeholder="New Password">
                              </div>
                              <div class="form-group">
                                  <label for="ReEnterNewPass">Re-Enter New Password</label>
                                  <input type="password" class="form-control" id="ReEnterNewPass" placeholder="Re-Enter New Password">
                              </div>
                          </div>
                          /.box-body
                          <div class="box-footer">
                              <button type="submit" class="btn btn-success   pull-right">Save</button>
                          </div>
                      </form>
                  </div>
                  /.box-body
              </div>
              /.box
          </div> -->
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
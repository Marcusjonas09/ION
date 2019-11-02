  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <strong>My Profile</strong>
          </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
          <div class="col-md-4">
              <!-- Profile Image -->
              <div class="box box-success">
                  <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>dist/img/default_avatar.png" style="width:200px; height:200px;" alt="User profile picture">
                      <br />
                      <h3 class="profile-username text-center"><?= $account->acc_fname . ' ' . $account->acc_mname . ' ' . $account->acc_lname ?></h3>

                      <p class="text-muted text-center">Program Director</p>

                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!-- Employee Details Box -->
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Student Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <table class="table">
                          <tr>
                              <td><strong class="pull-right">Employee No: </strong></td>
                              <td><?= $account->acc_number ?></td>
                          </tr>
                          <tr>
                              <td><strong class="pull-right">Designation: </strong></td>
                              <td><?= $account->acc_program ?></td>
                          </tr>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>

          <div class="col-md-8">
              <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#studInfo" data-toggle="tab">Basic Information</a></li>
                      <li><a href="#settings" data-toggle="tab">Settings</a></li>
                      <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
                  </ul>
                  <div class="tab-content">
                      <div class="active tab-pane" id="studInfo">
                          <div class="container-fluid">
                              <strong>First Name : </strong><?= $account->acc_fname ?><br /><br />
                              <strong>Middle Name: </strong><?= $account->acc_mname ?><br /><br />
                              <strong>Last Name: </strong><?= $account->acc_lname ?><br /><br />
                              <strong>Username: </strong><?= $account->acc_username ?>
                          </div>
                      </div>

                      <div class="tab-pane" id="settings">
                          <div class="container-fluid">
                          </div>
                      </div>

                      <!-- <div class="tab-pane" id="settings">

                          </div> -->

                  </div>
                  <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
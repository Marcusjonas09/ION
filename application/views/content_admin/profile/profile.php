  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <strong>Admin Profile</strong>
              <!-- <small>Administrator</small> -->
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Administrator</a></li>
              <li class="active">Admin Profile</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
          <div class="col-md-4">
              <!-- Profile Image -->
              <div class="box box-success">
                  <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>dist/img/user1-128x128.jpg" style="width:200px; height:200px;" alt="User profile picture">
                      <h3 class="profile-username text-center"><?= $account->acc_fname . ' ' . $account->acc_mname . ' ' . $account->acc_lname ?></h3>

                      <p class="text-muted text-center">Program Director</p>

                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!-- Employee Details Box -->
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Employee Details</h3>
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
              <!-- Account Profile Box -->
              <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Account Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <strong>First Name : </strong><?= $account->acc_fname ?><br /><br />
                      <strong>Middle Name: </strong><?= $account->acc_mname ?><br /><br />
                      <strong>Last Name: </strong><?= $account->acc_lname ?><br /><br />
                      <strong>Username: </strong><?= $account->acc_username ?>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
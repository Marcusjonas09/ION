  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <a class="navi" href="<?= base_url() ?>Admin/student_accounts"><span class="fa fa-chevron-left"></span></a>&nbsp&nbsp<strong>Student Profile</strong>
              <!-- <small>Administrator</small> -->
          </h1>
          <ol class="breadcrumb">
              <li><a href="<?= base_url() ?>Admin/student_accounts"><i class="fa fa-user"></i>Student Accounts</a></li>
              <li class="active">Student Profile</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

          <div class="row">
              <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="box box-success">
                      <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>dist/img/default_avatar.png" alt="User profile picture">

                          <h3 class="profile-username text-center"><?= $account->acc_fname . ' ' . $account->acc_mname . ' ' . $account->acc_lname ?></h3>

                          <p class="text-muted text-center"><?= $account->acc_number ?></p>

                          <!-- <ul class="list-group list-group-unbordered">
                              <li class="list-group-item">
                                  <b>Followers</b> <a class="pull-right">1,322</a>
                              </li>
                              <li class="list-group-item">
                                  <b>Following</b> <a class="pull-right">543</a>
                              </li>
                              <li class="list-group-item">
                                  <b>Friends</b> <a class="pull-right">13,287</a>
                              </li>
                          </ul> -->
                          <?php if ($account->acc_status) {
                                echo '<a href="' . base_url() . 'Admin/block_user/' . $account->acc_number . '" class="btn btn-danger btn-sm rounded col-md-12"><span class="fa fa-ban"></span> Block </a>';
                            } else {
                                echo '<a href="' . base_url() . 'Admin/block_user/' . $account->acc_number . '" class="btn btn-success btn-sm rounded col-md-12"><span class="fa fa-check"></span> Unblock </a>';
                            }; ?>
                          <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                          <li class="active"><a href="#studInfo" data-toggle="tab">Student Information</a></li>
                          <!-- <li><a href="#Schedule" data-toggle="tab">Schedule</a></li>
                          <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
                      </ul>
                      <div class="tab-content">
                          <div class="active tab-pane" id="studInfo">
                              <div class="container-fluid">
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                          <b>Student Number:</b> <a class="pull-right"><?= $account->acc_number ?></a>
                                      </li>
                                      <li class="list-group-item">
                                          <b>Citizenship:</b> <a class="pull-right"><?= $account->acc_citizenship ?></a>
                                      </li>
                                      <li class="list-group-item">
                                          <b>Program: </b> <a class="pull-right"><?= $account->acc_program ?></a>
                                      </li>
                                      <li class="list-group-item">
                                          <b>College</b> <a class="pull-right"><?= $account->acc_college ?></a>
                                      </li>
                                      <li class="list-group-item">
                                          <b>Curriculum Code:</b> <a class="pull-right"><?= $account->curriculum_code ?></a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <!-- 
                          <div class="tab-pane" id="Schedule">

                          </div>

                          <div class="tab-pane" id="settings">

                          </div> -->

                      </div>
                      <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
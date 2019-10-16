<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <strong>Petition Courses</strong>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="box box-success col-md-12">
      <div class="box-header with-border">
        <h3 class="box-title">Submit Petition</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?= base_url() ?>Student/submitPetition" method="POST">
        <div class="box-body">
          <?php if (validation_errors()) : ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              <?php echo validation_errors(); ?>
            </div>
          <?php endif; ?>

          <div class="form-group">
            <label class="col-md-2 control-label">Course Code</label>
            <div class="form-group col-md-6">
              <select name="course_code" class="form-control js-example-basic-single">
                <?php foreach ($curr as $cur) : ?>
                  <option value="<?= $cur->course_code ?>"><?= $cur->course_code . " - " . $cur->course_title ?></option>
                <?php endforeach; ?>

              </select>
            </div>
            <input type="hidden" name="stud_number" value="<?= $this->session->acc_number ?>" class="form-control">
            <input type="hidden" name="date_submitted" value="<?= time() ?>" class="form-control">
            <button type="submit" class="btn btn-success" style="margin-left:10px;">Submit</button>
            <!-- </div> -->
          </div>
        </div>
        <!-- /.box-body -->
      </form>
    </div>
    <!-- /.box -->

    <!-- Table showing all petitions related to this student account -->
    <div class="container-fluid col-md-6">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">My Petitions</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped">
            <thead>
              <th class="text-center">#</th>
              <th>Course</th>
              <th>Slots</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($petitions as $petition) : ?>
                <tr>
                  <td class="text-center"><?= $i ?></td>
                  <?php $i++; ?>
                  <td>
                    <strong><?= $petition->course_code ?></strong>
                    <?php foreach ($courses as $course) : ?>
                      <?php if ($petition->course_code == $course->course_code) : ?>
                        </p><small><?= $course->course_title ?></small></p>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </td>

                  <td>
                    <?php $i = 0; ?>
                    <?php foreach ($petitioners as $petitioner) {
                        if ($petitioner->petition_code == $petition->course_code) {
                          $i++;
                        }
                      } ?>
                    <?= $i . '/40' ?>
                  </td>

                  <td>
                    <?php if ($petition->petition_status == 1) {
                        echo "<span class='label label-success col-md-12'>Approved</span>";
                      } elseif ($petition->petition_status == 2) {
                        echo "<span class='label label-warning col-md-12'>Pending</span>";
                      } else {
                        echo "<span class='label label-danger col-md-12'>Denied</span>";
                      } ?>
                  </td>
                  <td>
                    <a href="<?= base_url() ?>Student/petitionView/<?= $petition->petition_ID ?>/<?= $petition->course_code ?>" class="btn btn-warning btn-sm rounded"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="col-md-6"><?= $this->pagination->create_links(); ?></div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="container-fluid col-md-6">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Suggested Petitions</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-striped">
            <thead>
              <th class="text-center">#</th>
              <th>Course</th>
              <th>Slots</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($petitions as $petition) : ?>
                <tr>
                  <td class="text-center"><?= $i ?></td>
                  <?php $i++; ?>
                  <td>
                    <strong><?= $petition->course_code ?></strong>
                    <?php foreach ($courses as $course) : ?>
                      <?php if ($petition->course_code == $course->course_code) : ?>
                        </p><small><?= $course->course_title ?></small></p>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <?php $i = 0; ?>
                    <?php foreach ($petitioners as $petitioner) {
                        if ($petitioner->petition_code == $petition->course_code) {
                          $i++;
                        }
                      } ?>
                    <?= $i . '/40' ?>
                  </td>
                  <td>
                    <?php if ($petition->petition_status == 1) {
                        echo "<span class='label label-success col-md-12'>Approved</span>";
                      } elseif ($petition->petition_status == 2) {
                        echo "<span class='label label-warning col-md-12'>Pending</span>";
                      } else {
                        echo "<span class='label label-danger col-md-12'>Denied</span>";
                      } ?>
                  </td>
                  <td>
                    <a href="<?= base_url() ?>Student/petitionView/<?= $petition->petition_ID ?>/<?= $petition->course_code ?>" class="btn btn-warning btn-sm rounded"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class="col-md-6"><?= $this->pagination->create_links(); ?></div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
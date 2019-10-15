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
    <div class="box box-success">
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
                <!-- <?php foreach ($offerings as $offer) : ?> -->
                <?php foreach ($curr as $cur) : ?>
                  <!-- <?php if ($cur->cc_status == null && $offer->offering_course_code == $cur->course_code && $offer->offering_course_slot > 0) : ?> -->
                  <option value="<?= $cur->course_code ?>"><?= $cur->course_code . ' - ' . $cur->course_title ?></option>
                  <!-- <?php endif; ?> -->
                <?php endforeach; ?>
                <!-- <?php endforeach; ?> -->
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

    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">My Petitions</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="petitionTable" class="table table-striped">
          <thead>
            <th class="text-center">#</th>
            <th>Course</th>
            <th>Course Title</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($petitions as $petition) : ?>
              <tr>
                <td class="text-center"><?= $i ?></td>
                <?php $i++; ?>

                <td><?= $petition->course_code ?></td>
                <td>
                  <?php foreach ($courses as $course) : ?>
                    <?php if ($petition->course_code == $course->course_code) : ?>
                      <?= $course->course_title ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </td>
                <td>
                  <?php if ($petition->petition_status == 1) {
                      echo "<span class='label label-success'>Approved</span>";
                    } elseif ($petition->petition_status == 2) {
                      echo "<span class='label label-warning'>Pending</span>";
                    } else {
                      echo "<span class='label label-danger'>Denied</span>";
                    } ?>
                </td>
                <td>
                  <a href="<?= base_url() ?>Student/petitionView/<?= $petition->petition_ID ?>/<?= $petition->course_code ?>" class="btn btn-warning btn-sm rounded"><i class="fa fa-eye"></i> View</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
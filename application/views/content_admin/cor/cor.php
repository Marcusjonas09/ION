  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <strong>COR Revision</strong>
        <small>Administrator</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">COR Revision</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <?php
      require 'vendor/autoload.php';
      $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        '8a5cfc7f91e3ec8112f4',
        'e5e5c5534c2aa13bb349',
        '880418',
        $options
      );

      $data['message'] = 'hello world';
      $pusher->trigger('my-channel', 'my-event', $data);
      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
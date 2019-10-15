<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <strong>COURSE FLOW</strong>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php foreach ($courseflow as $recommended) : ?>
            <?php foreach ($grades as $grade) : ?>
                <?php if ($recommended->course_code == $grade->course_taken && $grade->grade == "0.0") : ?>
                    <?= $recommended->course_code . '' . '<br/>' ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
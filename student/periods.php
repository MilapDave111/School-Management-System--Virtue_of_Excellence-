<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Periods</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/student/dashboard.php">Student</a></li>
              <li class="breadcrumb-item active">Periods</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-header py-2">
              <h3 class="card-title">
               Periods
              </h3>
              <div class="card-tools"></div>
              
          <div class="card-body">
          <div class="table-responsive bg-white">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>From</th>
                <th>To</th>
              </tr>
            </thead>

            <tbody>
                <?php
                $count=1;
                $args = array(
                  'type' => 'period',
                  'status'=> 'publish',
                  'is_deleted' => '0'
                );
                $periods = get_posts($args);
                foreach ($periods as $period) {
                  $from = get_meta_data($period->id, 'from')[0]->meta_value;
                  $to = get_meta_data($period->id, 'to')[0]->meta_value;?>
                <tr>
                  <td><?=$count++?></td>
                  <td><?=$period->title?></td>
                  <td><?php echo date('h:i A',strtotime($from)) ?></td>
                  <td><?php echo date('h:i A',strtotime($to)) ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
<?php include('footer.php') ?>
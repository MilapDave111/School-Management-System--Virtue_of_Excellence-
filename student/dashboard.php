<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
 
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Accounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <section class="content" >
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>   <?php 
            $query = mysqli_query($db_conn, "SELECT * FROM attendance WHERE `meta_id` = '$std_id'");
            if ($query && mysqli_num_rows($query) > 0) {
                $q = mysqli_fetch_object($query);
                echo '' . $q->percent . '<sup style="font-size: 15px">%</sup>';
            } else {
                echo '0<sup style="font-size: 20px">%</sup>';
            }
        ?></h3>
        <p>Attendance</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?php 
            $query = mysqli_query($db_conn, "SELECT COUNT(*) 
            FROM posts 
            INNER JOIN accounts ON posts.Class_onlyforsubject = accounts.class 
            WHERE posts.`type` = 'subject' 
            AND posts.`is_deleted`= 0 
            AND accounts.id = $std_id");
            $row = $query->fetch_assoc();
            $title = implode(',', $row);
            echo $title;
            ?></h3>

                <p>Subjects</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>70<sup style="font-size: 20px">%</sup></h3>

                <p>Syllabus</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3>8<sup style="font-size: 20px">/10</sup></h3>

                <p>Rating</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>

        </div>
    </section>


    
<?php include('footer.php') ?>
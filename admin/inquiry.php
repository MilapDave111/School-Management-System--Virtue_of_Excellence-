<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
 

   
    <!-- Content Header (Page header) -->
    <div class="content-header">  
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color:#03285e">Inquiries</h1> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Inquiry</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

        
        <div class="card bg-white">
            
            <div class="card-body">
            <table class="table table-bordered" >
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
          
            <th>Quiry</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $curse_query = mysqli_query($db_conn, "SELECT * FROM inquiry ORDER BY id desc");
        while ($inquiry = mysqli_fetch_object($curse_query)) {
            ?>
            <tr>
                <td><?= $count++ ?></td>
                <td><?= $inquiry->title ?></td>
                <td><?= $inquiry->email ?></td>
               
                <td><?= $inquiry->quiry ?></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
            </div>
        </div>

       
        </div>
    </section>


    
<?php include('footer.php') ?>
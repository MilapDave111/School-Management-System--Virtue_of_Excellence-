<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
   
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/teacher/dashboard.php">Teacher</a></li>
              <li class="breadcrumb-item active">Events</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    

    <section class="content">
        <div class="container-fluid">
            
                
      
        
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                Events
                </h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                    <th>S.No</th>
                    <th>Title/Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Time</th>
                    <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $count=1;
                    $query=mysqli_query($db_conn, 'SELECT * FROM events');
                    while($q = mysqli_fetch_object($query))
                    {?>
                    <tr>
                        <td><?=$count++?></td>
                        <td><?=$q->name?></td>
                        <td><?=$q->date?></td>
                        <td><?=$q->venue?></td>
                        <td><?=$q->time?></td>
                        <td><?=$q->description?></td>
                    </tr>
                        
                    <?php }?>
                    
                  </tbody>
                  </table>
            </div>
        </div>
                
                
            
        
          
        </div>
    </section>

<?php include('footer.php') ?>
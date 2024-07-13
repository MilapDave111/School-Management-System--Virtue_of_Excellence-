<?php include('../includes/config.php') ?>
<?php
if(isset($_POST['submit']))
{
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $rollno = isset($_POST['rollno']) ? $_POST['rollno'] : '';
  $issued_date = date('Y-m-d g:i:s');

  $query = mysqli_query($db_conn,"INSERT INTO lib_book_status (book_name, rollno, issued_date) VALUES
  ('$name','$rollno','$issued_date')") or die(mysqli_error($db_conn));
  
  header('Location: library.php');
  exit;
}?>

<?php       
if(isset($_POST['submit_2']))
{
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $author = isset($_POST['author']) ? $_POST['author'] : '';
  $published_date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d g:i:s');
  

  mysqli_query($db_conn,"INSERT INTO `lib_book` (`book_name`, `author`,`publish`)
  VALUES ('$name', '$author', '$published_date')") or die(mysqli_error($db_conn));
  
  header('Location: library.php');
  exit;
}
?>


<?php include('header.php') ?>
<?php include('sidebar.php') ?>


     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Library
                <a href="?action=add" class="btn btn-success btn-sm"> Add New Book </a>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Admin</a></li>
              <li class="breadcrumb-item active">Library</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
  <section class="content">
          <div class="container-fluid">
            <?php  if(isset($_GET['action']) && $_GET['action'] == 'add') {?>
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="class">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Book Name">
                    </div>
                                        
                    <div class="form-group" id="section-container">
                      <label for="section">Author </label>
                      <input type="text" class="form-control" name="author" id="author" placeholder="Author Name">
                    </div>
                                       
                                              
                    <div class="form-group" id="section-container">
                        <label for="teacher_id">Published</label>&nbsp;
                      <input class="form-control" type="date" name="date" id="date" >
                    </div>

                  
                    <div class="from-group">
                      <label for="">&nbsp;</label>
                      <input type="submit" value="submit" name="submit_2" class="form-control">
                    </div>

                  </div>
                </form>
              </div>
            </div>
            </div>
          <?php } else { ?>
        <div class="card">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-lg"> 
                    <div class="form-group">
                      <label for="">Name</label>
                      <select class="form-control" name="name" id="name">
                      <option>Select available Book</option>
                        <?php 
                          $query = mysqli_query($db_conn,"SELECT * FROM lib_book");
                          While($lib = mysqli_fetch_object($query))
                          {?>
                            <option><?=$lib->book_name?></option>
                         <?php }
                        ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                        <label for="">Roll NO</label>&nbsp;
                      <input class="form-control" type="text" name="rollno" id="rollno" placeholder="Roll No">
                    </div>
                    </div>
                  <div class="col-lg">
                    <div class="form-group" id="section-container">
                        <label for="">Issued Date</label>&nbsp;
                      <input class="form-control" type="date" name="date_i" id="date_i" >
                    </div>
                    </div>
                  <div class="col-lg">
                    <div class="from-group">
                      <label for="">&nbsp;</label>
                      <input type="submit" value="submit" name="submit" class="form-control">
                    </div>
                    </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <table cellpadding="40%" class="table-bordered">
              <thead>
                <tr>
                  <th>SrNo</th>
                  <th>rollno</th>
                  <th>Book Name</th>
                  <th>Issued_date</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                  $query = mysqli_query($db_conn,"SELECT * FROM lib_book_status");
                  while($library = mysqli_fetch_object($query))
                  {?>
                    <tr>
                    <th><?=$library->id?></th>
                    <th><?=$library->rollno?></th>
                    <th><?=$library->book_name?></th>
                    <th><?=$library->issued_date?></th>
                    </tr>
                 <?php } ?>                
              </tbody>
            </table>
          </div>
        </div>
      <?php }  ?>
    </div><!--/. container-fluid -->
  </section>
<script>
jQuery(document).ready(function(){

  jQuery('#class_id').change(function(){
    // alert(jQuery(this).val());

    jQuery.ajax({
      url:'ajax.php',
      type : 'POST',
      data  : {'class_id':jQuery(this).val()},
      dataType : 'json',
      success: function(response){
        if(response.count > 0)
        {
          jQuery('#section-container').show();        
        }
        else
        {
          jQuery('#section-container').hide();
        }
        jQuery('#section_id').html(response.options); 
      }
    });
  });

})
</script>

<?php include('footer.php') ?>
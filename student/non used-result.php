<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php 
          $othermeta = get_user_meta_data($std_id);
          $student = get_user_data1($std_id);
          ?>
        <div class="card">
          
          <div class="card-body"> 
            <strong>Name: </strong> <?php echo get_users(array('id'=>$std_id))[0]->name ?> <br>
            <strong>Rollno: </strong> <?php echo get_users(array('id'=>$std_id))[0]->rollno ?> 
<table border='1px' width ='100%'>
    <tr>
        <th>Subjects</th>
        
        <th>Mark</th>
       
    </tr>
   
    <tbody>
        <?php
        
        $c_query = mysqli_query($db_conn, "SELECT * FROM result as r INNER JOIN accounts as a ON a.rollno = r.rollno WHERE a.id = $std_id ");

        while ($c = mysqli_fetch_object($c_query)) {
        ?>
        <tr>
           <td><?=$c->subject?></td>                        
           <td><?=$c->total?></td>
        </tr>
                                
        >
        <tr>
            <td><?=$c->count?></td>
        </tr>
        <?php } ?>
        </tbody>
        
    
</table>
<?php include('footer.php') ?>
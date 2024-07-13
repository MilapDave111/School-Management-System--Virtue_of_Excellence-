<?php include("../includes/config.php") ?>
<?php include("header.php") ?>
<?php include("sidebar.php") ?>



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Library
                    
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
    <?php  if(isset($_GET['action']) && $_GET['action'] == 'availability') {
        if(isset($_POST['search'])) {
            // Get the search term
            $searchTerm = $_POST['search'];
            // Perform the search query to get the count of available books
            $availableBooksCount = searchBooksAndCount($searchTerm);
    
            echo "<p>Search results for '$searchTerm': $availableBooksCount book(s) available</p>";
        }?>
        <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#00b359">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" ><i class="fas fa-book-open fa-3x float-lg-left" ></i>
                    <a href ="?action=availability" class="text-white"><h5 class="py-2"><b>Availability</b></h5></a>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form method="POST" action="?action=availability">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search for a book">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#1a8cff">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-book fa-3x float-lg-left "></i>
                        <a href ="?action=add-book" class="text-white"><h5 class="py-2"><b>Add Books</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#ff1a1a">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-pen fa-2x float-lg-left py-1"></i>
                        <a href ="?action=issue-renew" class="text-white"><h5 class="py-2"><b>Issue/Renew</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#47d1d1">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-key fa-2x float-lg-left py-1"></i>
                            <a href ="?action=catalog" class="text-white"><h5 class="py-2">Catalog<b></b></h5></a>
                    </div>
                </div>
            </div>
         </div>

            
         

    </div>


    <?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'add-book') {

    if (isset($_POST['submit'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $author = isset($_POST['author']) ? $_POST['author'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';

       
        $path = $_FILES["fileToUpload"]["name"];

        $target_dir = "../dist/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                mysqli_query(
                    $db_conn,
                    "INSERT INTO books (`title`,`author`,`category`,`path`) VALUES ('$title','$author','$category','$path')"
                ) or die(mysqli_error($db_conn));
                echo "Successfully File Uploaded";
                
                exit;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card py-4" style="width:230px; height:90px;  background-color:#00b359">
                            <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" ><i class="fas fa-book-open fa-3x float-lg-left" ></i>
                                <a href ="?action=availability" class="text-white"><h5 class="py-2"><b>Availability</b></h5></a>
                            </div>
                        </div>
                    </div>
            
                </div>
                <div class="row">
                    <div class="col-lg-3"><br>
                        <div class="card py-4" style="width:230px; height:90px;  background-color:#1a8cff">
                            <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                <i class="fa fa-book fa-3x float-lg-left "></i>
                                <a href ="?action=add-book" class="text-white"><h5 class="py-2"><b>Add Books</b></h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><br>
                        <div class="card py-4" style="width:230px; height:90px;  background-color:#ff1a1a">
                            <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                <i class="fa fa-pen fa-2x float-lg-left py-1"></i>
                                <a href ="?action=issue-renew" class="text-white"><h5 class="py-2"><b>Issue/Renew</b></h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><br>
                        <div class="card py-4" style="width:230px; height:90px;  background-color:#47d1d1">
                            <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                                <i class="fa fa-key fa-2x float-lg-left py-1"></i>
                                    <a href ="?action=catalog" class="text-white"><h5 class="py-2">Catalog<b></b></h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





       
        
            <div class="col-lg-8">
                <div class="row">
                    
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Book Title</label>
                                                <input type="text" name="title" id="title" placeholder="Book Title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Author Name</label>
                                                <input type="text" name="author" id="title" placeholder="Author Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Category</label>  
                                                <select name="category" id="category" class="form-control">
                                                    <option value="">Select Category</option>
                                                    <option value="Maths">Maths</option>
                                                    <option value="English">English</option>
                                                    <option value="Science">Science</option>
                                                    <option value="Social Study">Social Study</option>
                                                    <option value="Novel">Novel</option>
                                                    <option value="Autobiography">Autobiography</option>
                                                    <option value="Encyclopedia">Encyclopedia</option>
                                                    <option value="Humor">Humor</option>
                                                    <option value="Fiction">Fiction</option>
                                                    <option value="Autobiography">Autobiography</option>
                                                    <option value="Poetry">Poetry</option>
                                                    <option value="Horrort">Horror</option>
                                                    <option value="Mystery">Mystery</option>
                                                </select>
                                                
                                            </div>
                                   
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="">Upload File</label><br>
                                    <input type="file" name="fileToUpload" id="fileToUpload" >
                                            </div>
                                        </div>
    </div>
                                        

                                        <div class="col-lg-3">
                                        <button class="btn btn-success btn-sm" name="submit" id="submit" style="height:40px">Add Book</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    

    <?php } elseif(isset($_GET['action']) && $_GET['action'] == 'issue-renew') {
        $title = isset($_POST['title'])?$_POST['title']:'';
        $author = isset($_POST['author'])?$_POST['author']:'';
        $scategory = isset($_POST['scategory'])?$_POST['scategory']:'';
        $sname = isset($_POST['sname'])?$_POST['sname']:'';
        $sclass = isset($_POST['sclass'])?$_POST['sclass']:'';
        $rollno = isset($_POST['rollno'])?$_POST['rollno']:'';
        $issue_date = isset($_POST['issue_date'])?$_POST['issue_date']:'';
        $renew_date = isset($_POST['renew_date'])?$_POST['renew_date']:'';
        $return_date = isset($_POST['return_date'])?$_POST['return_date']:'';
        
        $query = mysqli_query($db_conn, "INSERT INTO book_issue (`title`,`author`,`category`,`sname`,`sclass`,`rollno`,`issue_date`,`renew_date`,`return_date`) VALUES ('$title','$author','$scategory','$sname','$sclass','$rollno',' $issue_date','$renew_date','$return_date')");

        ?>
        <div class="row">
            <div class="col-lg-3">
            <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#00b359">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" ><i class="fas fa-book-open fa-3x float-lg-left" ></i>
                    <a href ="?action=availability" class="text-white"><h5 class="py-2"><b>Availability</b></h5></a>
                    
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#1a8cff">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-book fa-3x float-lg-left "></i>
                        <a href ="?action=add-book" class="text-white"><h5 class="py-2"><b>Add Books</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#ff1a1a">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-pen fa-2x float-lg-left py-1"></i>
                        <a href ="?action=issue-renew" class="text-white"><h5 class="py-2"><b>Issue/Renew</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#47d1d1">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-key fa-2x float-lg-left py-1"></i>
                            <a href ="?action=catalog" class="text-white"><h5 class="py-2">Catalog<b></b></h5></a>
                    </div>
                </div>
            </div>
         </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Book Title</label>
                                        <input type="text" name="title" id="title" placeholder="Book Title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Author Name</label>
                                        <input type="text" name="author" id="title" placeholder="Author Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Category</label>  
                                            <select name="scategory" id="scategory" class="form-control">
                                            <option value="">Select Category</option>
                                            <option value="Maths">Maths</option>
                                            <option value="English">English</option>
                                            <option value="Science">Science</option>
                                            <option value="Social Study">Social Study</option>
                                            <option value="Novel">Novel</option>
                                            <option value="Autobiography">Autobiography</option>
                                            <option value="Encyclopedia">Encyclopedia</option>
                                            <option value="Humor">Humor</option>
                                            <option value="Fiction">Fiction</option>
                                            <option value="Autobiography">Autobiography</option>
                                            <option value="Poetry">Poetry</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Mystery">Mystery</option>
                                            </select>
                                        
                                    </div>
                                   
                                </div>
                            
                                    
                                       
                                    
                               
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Student Full Name</label>
                                        <input type="text" name="sname"  placeholder="Student Full Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Student Class</label>
                                        <input type="text" name="sclass" placeholder="Student Class" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Roll No</label>
                                        <input type="text" name="rollno" placeholder="Roll No" class="form-control">
                                        
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Issue Date</label>
                                        <input type="date" name="issue_date"  placeholder="Book Title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Renew Date</label>
                                        <input type="date" name="renew_date"  placeholder="Author Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Return Date</label>
                                        <input type="date" name="return_date"  placeholder="Author Name" class="form-control">
                                    </div>
                                </div>
                               
                            </div>
                            
                            <button class="btn btn-success" name="submit1" id="submit1">Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        </div>

            
         

    

    <?php } elseif(isset($_GET['action']) && $_GET['action'] == 'catalog') {
        ?>
        <div class="row">
            <div class="col-lg-3">
            <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#00b359">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" ><i class="fas fa-book-open fa-3x float-lg-left" ></i>
                    <a href ="?action=availability" class="text-white"><h5 class="py-2"><b>Availability</b></h5></a>
                    
                    </div>
                </div>
            </div>
           
        </div><br>
        
        <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#1a8cff">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-book fa-3x float-lg-left "></i>
                        <a href ="?action=add-book" class="text-white"><h5 class="py-2"><b>Add Books</b></h5></a>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#ff1a1a">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-pen fa-2x float-lg-left py-1"></i>
                        <a href ="?action=issue-renew" class="text-white"><h5 class="py-2"><b>Issue/Renew</b></h5></a>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#47d1d1">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-key fa-2x float-lg-left py-1"></i>
                            <a href ="?action=catalog" class="text-white"><h5 class="py-2">Catalog<b></b></h5></a>
                    </div>
                </div>
            </div>
         </div><br>
            </div>
        

            <div class="col-lg-8">
    <div class="row">
        <?php
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_category'])) {
            $selectedCategory = $_POST['selected_category'];
            $booksQuery = mysqli_query($db_conn, "SELECT * FROM books WHERE category = '$selectedCategory'");

            while ($book = mysqli_fetch_object($booksQuery)) {
        ?>
                <div class="col-lg-3">
                    <div class="card" style="background-color: white; border-radius: 15%; width: 150px; height: px;">
                        <div class="card-body">
                            <b class="text-dark">Title:</b><?php echo $book->title ?>
                            <b class="text-dark">Author:</b><?php echo $book->author ?>
                            <a href="../dist/uploads/<?= $book->path ?>" download><i class="fa fa-download">&nbsp;Download</i></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            
            $categoryQuery = mysqli_query($db_conn, "SELECT DISTINCT category FROM books");

            while ($category = mysqli_fetch_object($categoryQuery)) {
        ?>
                <div class="col-lg-3">
                    <div class="card" style="background-color: white; border-radius: 10%; width: 200px; height: 105px;">
                        <form action="" method="post">
                            <input type="hidden" name="selected_category" value="<?php echo $category->category ?>">
                            <button type="submit" class="btn btn-link">
                                <div class="card-body">
                                <h4 >
                                    <b class="text-dark"><?php echo $category->category ?></b>
                                    </h4>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

    

        <?php } else { ?>
            <div class="row">
            <div class="col-lg-3">
                <div class="card py-4" style="width:230px; height:90px;  background-color:#00b359">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" ><i class="fas fa-book-open fa-3x float-lg-left" ></i>
                    <a href ="?action=availability" class="text-white"><h5 class="py-2"><b>Availability</b></h5></a>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#1a8cff">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-book fa-3x float-lg-left "></i>
                        <a href ="?action=add-book" class="text-white"><h5 class="py-2"><b>Add Books</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#ff1a1a">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-pen fa-2x float-lg-left py-1"></i>
                        <a href ="?action=issue-renew" class="text-white"><h5 class="py-2"><b>Issue/Renew</b></h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><br>
                <div class="card py-4" style="width:230px; height:90px;  background-color:#47d1d1">
                    <div class="card-body" style="padding-top:0%; margin-top:0%;text-align:center;" >
                        <i class="fa fa-key fa-2x float-lg-left py-1"></i>
                            <a href ="?action=catalog" class="text-white"><h5 class="py-2">Catalog<b></b></h5></a>
                    </div>
                </div>
            </div>
         </div>
        <?php } ?>
               
            </div>
            
       
</section>
<?php include("footer.php") ?>
<?php include("includes/config.php") ?>

<?php include("header.php") ?>    
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg">
    
    <img class="img-fluid " src="img/limg2.png" alt="" style="width:22%; height:22%;margin-left:10px">
   
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active" style="color:#03285e"><b>Home</b></a>
            <a href="about.php" class="nav-item nav-link" style="color:#03285e"><b>About</b></a>
           
            <a href="contact.php" class="nav-item nav-link" style="color:#03285e"><b>Contact</b></a>
            <?php if (isset($_SESSION['login'])) { ?>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#03285e">
                        <i class="fa fa-user fa-lg" style="color:#03285e"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color:#03285e">
                        <li><a class="dropdown-item" href="http://localhost/Virtue_of_Excellence/admin/dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <a href="../Virtue_of_Excellence/login.php" class="nav-item nav-link active" style="color:#03285e"><i class="fa fa-user" style="color:#03285e"></i> <b>Login</b></a>
            <?php } ?>
        </div>
    </div>
</nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid  py-5 mb-5 " style="background:url('img/aboutus.jpg');background-size: cover;height:400px">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center"><br><br>
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="contact.php">Contact</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap  mb-4" style="color:#03285e"></i>
                            <h5 class="mb-3">Skilled Instructors</h5>
                            <p>Discover daily brilliance with our expertly crafted education, guiding you on a path to success</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe  mb-4"  style="color:#03285e"></i>
                            <h5 class="mb-3">Online Classes</h5>
                            <p>We offer the convenience of online classes, ensuring education never pauses.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home  mb-4"  style="color:#03285e"></i>
                            <h5 class="mb-3">Home Projects</h5>
                            <p>Empowering students with engaging home projects that foster practical application of knowledge.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open  mb-4"  style="color:#03285e"></i>
                            <h5 class="mb-3">Book Library</h5>
                            <p>Dive into endless knowledge with our school's library, a hub for exploration and discovery.  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/abouttt.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title text-start pe-3" style="color:#468ef3;">About Us</h6>
                    <h1 class="mb-4" style="color:#03285e;">Welcome to Virtue Of Excellence</h1>
                    <p class="mb-4">Welcome to Virtue of Excellence, where a commitment to academic distinction meets a nurturing environment for personal growth.At Virtue of Excellence, we believe that every student possesses unique talents and potential waiting to be unlocked. </p>
                    <p class="mb-4">Our commitment goes beyond academics. We aim to instill values of integrity, respect, and responsibility in our students, preparing them not just for academic success but also for life. </p>
                    <a href="http://localhost/Virtue_of_Excellence/contact.php" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background-color:#03285e;">Join Us</a>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center px-3" style="color:#468ef3">Teachers</h6>
            <h1 class="mb-5" style="color:#03285e;">Expert Teachers</h1>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE type='teacher' ORDER BY id desc LIMIT 0, 4");
            while ($teacher = mysqli_fetch_object($query)) {
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item" style="background-color:#F3F3F5; height: 400px; overflow: hidden;">
                        <div class="position-relative overflow-hidden" style="height: 60%;">
                            <img class="img-fluid" src="./dist/uploads/<?php echo $teacher->image ?>" style="object-fit: cover; object-position: center; width: 100%; height: 100%;" alt="<?php echo $teacher->name ?> Image">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class=" d-flex justify-content-center pt-2 px-1">
                                <div class="btn btn-sm-square mx-1" href="" style="background-color:#03285e"><i class="fab text-white fa-facebook-f"></i></div>
                                <div class="btn btn-sm-square mx-1" href="" style="background-color:#03285e"><i class="fab text-white fa-twitter"></i></div>
                                <div class="btn btn-sm-square mx-1" href="" style="background-color:#03285e"><i class="fab text-white fa-instagram"></i></div>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo $teacher->name ?></h5> <br>
                            <small><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    <!-- Team End -->
    <div class="container-xxl py-5" style="background:#023073">
        <div class="container">
            <div class="row g-5">
                
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   
                    <h1 class="mb-4 text-white" style="color:#03285e;">Our Vision</h1>
                    <p class="mb-4 text-white">At Virtue of Excellence School, our vision is to be a leading educational institution renowned for fostering a culture of excellence, innovation, and integrity. We aspire to empower every student to reach their full potential academically, socially, and personally.</p>
                    <p class="mb-4 text-white">We envision a learning community where curiosity is celebrated, challenges are embraced, and learning knows no boundaries. Through a dynamic and comprehensive curriculum, we aim to equip our students with the knowledge, skills, and values they need to thrive in an ever-changing global landscape.</p>
                    <p class="mb-4 text-white">Join us at Virtue of Excellence School, where every journey begins with a commitment to excellence and a vision for a brighter future.</p>
                    <a href="http://localhost/Virtue_of_Excellence/contact.php" class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft" style="background-color:#468ef3;">Join Us</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/our.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    
                    <p class="mb-2 text-white"><i class="fa fa-phone-alt me-3"></i>+91 345 67890</p>
                    <p class="mb-2 text-white"><i class="fa fa-envelope me-3"></i>virtue@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn  btn-outline-light btn-social" href=""><i class="fab text-white fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab text-white fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab text-white fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab text-white fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Inquiry </h4>
                    
                    <form action="" method="POST">
              <div class="form-group ">
                <label for="title" class="text-white">Your Name</label>  
                <input required type="text" placeholder="Name" class="form-control" name="name" require>
                </div>
                <div class="form-group">
                <label for="from" class="text-white">Your Email</label>  
                <input type="email" name="email" placeholder="Email" class="form-control"require>
                </div>
                <div class="form-group">
                <label for="to" class="text-white">Description</label>  
                <input required type="text" placeholder="Description" class="form-control" name="quiry" require>
                </div>
                <div class="form-group">
                
                </div>
              </form>
              <button name="submit" value="submit"class="btn btn-success float-right">Submit</button>
                   
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Virtue Of Excellence</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
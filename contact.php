<?php include("includes\config.php") ?>
<?php include("header.php") ?>  

<?php 


    if(isset($_POST['submit']))
    {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
  
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $quiry = isset($_POST['quiry']) ? $_POST['quiry'] : '';

    mysqli_query($db_conn,"INSERT INTO `inquiry` (`title`,`email`,`quiry`) 
    VALUES ('$name',' $email','$quiry')");
    }
  
  ?>


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
    <div class="container-fluid   " style="background:url('img/111.jpg'); height:400px;background-size: cover;">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center"><br><br><br>
                    <h1 class="display-3 text-center animated slideInDown" style="color:#03285e;">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="" href="index.php"style="color:#03285e">Home</a></li>
                            <li class="breadcrumb-item"><a class="" href="about.php" style="color:#03285e">Pages</a></li>
                            <li class="breadcrumb-item  active" aria-current="page" style="color:#03285e">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center  px-3" style="color:#03285e">Contact Us</h6>
                <h1 class="mb-5"  style="color:#03285e;">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form" style="color:#03285e">Download Now</a>.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 "style="background-color:#03285e ;width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="" style="color:#03285e">Office</h5>
                            <p class="mb-0">Virtue Of Exellence, near 150ft ring road, Rajkot</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="background-color:#03285e;width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="" style="color:#03285e">Mobile</h5>
                            <p class="mb-0">9427758586</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 "style="background-color:#03285e;width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class=""style="color:#03285e">Email</h5>
                            <p class="mb-0">virtue@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                 
                <input required type="text" placeholder="Name" class="form-control" name="name" require>
                <label for="title">Your Name</label> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="quiry" id="message" style="height: 150px"></textarea>
                                    <label for="message">Description</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn text-white w-100 py-3" type="submit" value="submit" name="submit" style="background-color:#03285e">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>virtue@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
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
    <a href="#" class="btn btn-lg text-white btn-lg-square back-to-top" style="background-color:#03285e"><i class="bi bi-arrow-up" ></i></a>


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
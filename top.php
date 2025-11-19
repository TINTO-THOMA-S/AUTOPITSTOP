<!DOCTYPE html>
<html lang="en">

<head>
    <style></style>
    <meta charset="utf-8">
    <title>Autopit-stop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
  <div class="position-relative px-lg-5" style="z-index: 9;">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <i class="fa-solid fa-car-wrench text-warning mr-2" style="font-size: 26px;"></i>
        <h1 class="text-uppercase text-primary mb-0">AUTOPIT</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
        <div class="navbar-nav ml-auto py-0">
          <a href="index.php" class="nav-item nav-link active">
            <i class="fa-solid fa-house text-warning mr-1"></i>Home
          </a>
          <a href="about.php" class="nav-item nav-link">
            <i class="fa-solid fa-circle-info text-warning mr-1"></i>About
          </a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa-solid fa-screwdriver-wrench text-warning mr-1"></i>Service
            </a>
            <div class="dropdown-menu rounded-0 m-0">
              <a href="service.php" class="dropdown-item">
                <i class="fa-solid fa-plus-circle text-warning mr-2"></i>Add Service
              </a>
              <a href="view_serviceinfo.php" class="dropdown-item">
                <i class="fa-solid fa-eye text-warning mr-2"></i>View Service
              </a>
            </div>
          </div>
          <a href="view_approved.php" class="nav-item nav-link">
            <i class="fa-solid fa-calendar-check text-warning mr-1"></i>Booking
          </a>
          <a href="viewreq.php" class="nav-item nav-link">
            <i class="fa-solid fa-handshake text-warning mr-1"></i>Request
          </a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa-solid fa-triangle-exclamation text-warning mr-1"></i>Emergency
            </a>
            <div class="dropdown-menu rounded-0 m-0">
              <a href="emergency.php" class="dropdown-item">
                <i class="fa-solid fa-bolt text-warning mr-2"></i>New Emergency Service
              </a>
              <a href="view_emergency_request.php" class="dropdown-item">
                <i class="fa-solid fa-list text-warning mr-2"></i>Emergency Request
              </a>
              <a href="emergency_approved.php" class="dropdown-item">
                <i class="fa-solid fa-check-circle text-warning mr-2"></i>Emergency Approved
              </a>
            </div>
          </div>
            <a href="feedback.php" class="nav-item nav-link">
            <i class="fa-solid fa-calendar-check text-warning mr-1"></i>Feedback
          </a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa-solid fa-user-circle text-warning mr-1"></i>My Account
            </a>
            <div class="dropdown-menu rounded-0 m-0">
                <a href="profile.php" class="dropdown-item">
                <i class="fa-solid fa-user-gear text-warning mr-1"></i>Profile
              </a>
              <a href="change_password.php" class="dropdown-item">
                <i class="fa-solid fa-key text-warning mr-2"></i>Change Password
              </a>
              <a href="../common/login.php" class="dropdown-item">
                <i class="fa-solid fa-right-from-bracket text-warning mr-2"></i>Sign Out
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->

<!-- Font Awesome 6 (add this once in <head> if not already included) -->




    
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
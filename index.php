<?php  
include("top.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AUTO PIT STOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary: #F77D0A;
      --dark: #2B2E4A;
      --light: #F4F5F8;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--dark);
    }

    /* Hero Section */
    .hero {
      background: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
      height: 100vh;
      color: #fff;
      display: flex;
      align-items: center;
      text-align: center;
      position: relative;
    }
    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
    }
    .hero-content {
      position: relative;
      z-index: 1;
      width: 100%;
    }
    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      color: #fff; /* Ensure no blue */
    }
    .hero p {
      font-size: 1.2rem;
      margin-top: 10px;
      color: #f4f4f4;
    }

    .hero .btn {
      margin: 10px;
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .hero .btn-primary {
      background-color: var(--dark);
      border: none;
    }

    .hero .btn-primary:hover {
      background-color: #1a1c36;
    }

    .hero .btn-outline-light {
      background-color: var(--primary);
      border: 2px solid var(--primary);
      color: #fff;
      font-size: 1.1rem;
      font-weight: 700;
      text-transform: uppercase;
      box-shadow: 0 0 15px rgba(247, 125, 10, 0.5);
    }

    .hero .btn-outline-light:hover {
      background-color: #fff;
      color: var(--primary);
      transform: scale(1.05);
    }

    /* About Section */
    #about {
      padding: 80px 0;
      background-color: #f8f9fa;
    }
    #about h2 {
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 20px;
    }

    /* Services */
    #services {
      padding: 80px 0;
    }
    .service-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .service-card:hover {
      transform: translateY(-5px);
    }
    .service-card img {
      height: 180px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    /* Contact */
    #contact {
      padding: 80px 0;
      background-color: #f8f9fa;
    }

    footer {
      background-color: #222;
      color: #fff;
      padding: 20px 0;
    }
  </style>
</head>

<body>

<!-- Hero Banner -->
<section class="hero">
  <div class="container hero-content">
    <h1>Welcome to AUTO PIT STOP</h1>
    <p>Your trusted partner for all car care and service needs.</p>
    <a href="login.php" class="btn btn-primary">Login</a>
    <a href="owner_reg.php" class="btn btn-outline-light">Owner Register</a>
  </div>
</section>

<!-- About -->
<section id="about" class="text-center">
  <div class="container">
    <h2>About AUTO PIT STOP</h2>
    <p class="lead mx-auto" style="max-width: 800px;">
      AUTO PIT STOP connects car owners and verified garages on a single platform. 
      Book services, request emergency help, and manage your vehicle’s maintenance effortlessly.
    </p>
  </div>
</section>

<!-- Services -->
<section id="services" class="text-center">
  <div class="container">
    <h2>Our Services</h2>
    <div class="row mt-4">
      <div class="col-md-4 mb-4">
        <div class="card service-card">
          <img src="../common/REGULAR.jpg" class="card-img-top" alt="Service 1">
          <div class="card-body">
            <h5 class="card-title">Regular Maintenance</h5>
            <p class="card-text">Keep your vehicle in top condition with scheduled check-ups and servicing.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card service-card">
          <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Service 2">
          <div class="card-body">
            <h5 class="card-title">Emergency Assistance</h5>
            <p class="card-text">Get instant help in case of breakdowns or on-road emergencies, anytime, anywhere.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card service-card">
          <img src="../common/VERIFIED%20GARAGES.jpeg" class="card-img-top" alt="Service 3">
          <div class="card-body">
            <h5 class="card-title">Verified Garages</h5>
            <p class="card-text">Find trusted garages and mechanics approved by AUTO PIT STOP for quality service.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact">
  <div class="container">
    <h2 class="text-center">Contact Us</h2>
    <div class="row mt-4">
      <div class="col-md-6">
        <p><strong>Email:</strong> support@autopitstop.com</p>
        <p><strong>Phone:</strong> +91 8157836104</p>
        <p><strong>Address:</strong> College Kerala</p>
      </div>
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps?q=cochin%20arts%20and%20science%20college&output=embed" width="100%" height="250" style="border:0;" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

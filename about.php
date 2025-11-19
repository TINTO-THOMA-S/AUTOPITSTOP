<?php 
include('top.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Auto Pit Stop</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    background-color: #fff;
    color: #333;
  }

  .about-section {
    max-width: 900px;
    margin: 60px auto;
    text-align: center;
    padding: 30px;
    border: 1px solid #2B2E4A;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
  }

  .about-section h1 {
    color: #F77D0A;
    font-size: 34px;
    margin-bottom: 10px;
    letter-spacing: 1px;
  }

  .divider {
    width: 80px;
    height: 3px;
    background-color: #2B2E4A;
    margin: 10px auto 25px auto;
    border-radius: 2px;
  }

  .about-section p {
    font-size: 17px;
    line-height: 1.7;
    color: #444;
    max-width: 800px;
    margin: 0 auto 10px auto;
  }

  .highlight {
    background-color: #fff5f5;
    border-left: 4px solid #2B2E4A;
    margin-top: 25px;
    padding: 20px;
    border-radius: 8px;
    text-align: left;
  }

  .highlight p {
    margin: 10px 0;
  }

  /* Button styling (orange + dark blue theme) */
  .btn-link {
    display: inline-block;
    margin-top: 10px;
    background-color: #F77D0A;
    color: #fff;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .btn-link:hover {
    background-color: #2B2E4A;
    color: #fff;
  }

  .provider-link a {
    color: #2B2E4A;
    font-weight: 600;
    text-decoration: none;
  }

  .provider-link a:hover {
    color: #F77D0A;
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="about-section">
  <h1>AUTO PIT STOP</h1>
  <div class="divider"></div>
  <p>
    Auto Pit Stop is a simple web platform built to connect car owners with verified garages and mechanics. 
    It helps users book services, request emergency help, and manage vehicle maintenance with ease.
  </p>
  <p>
    Service providers can register their garages, get approved by the admin, and offer trusted services to nearby customers.
  </p>
  
  <div class="highlight">
    <p>🚗 <b>Car Owners:</b> Register and book trusted car services.</p>
    <a href="owner_reg.php" class="btn-link">Car Owner Registration</a>

    <p>🧰 <b>Providers:</b> Verified garages deliver reliable care.</p>
    <div class="provider-link">
      <a href="provider_reg.php">
        <i class="fa-solid fa-user-plus text-warning"></i> Become a Partner
      </a>
    </div>
  </div>
</div>

</body>
</html>

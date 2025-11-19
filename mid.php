
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Auto Pit Stop | Provider Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Auto Pit Stop Provider Page" name="keywords">
  <meta content="Auto Pit Stop - Service Provider Dashboard and Support" name="description">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Rubik', sans-serif;
      background: linear-gradient(120deg, #fdfcfb, #f3f3f3);
      margin: 0;
      padding: 0;
      color: #333;
    }

    .dashboard-header {
      background: linear-gradient(120deg, #2B2E4A, #1C1E32);
      color: white;
      text-align: center;
      padding: 50px 20px;
      border-radius: 0 0 40px 40px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .dashboard-header h1 {
      font-weight: 600;
      text-transform: uppercase;
      margin-bottom: 10px;
      color: #F77D0A;
    }

    .dashboard-header p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    .stats-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 25px;
      margin-top: -40px;
      padding: 20px;
    }

    .stat-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      padding: 25px;
      text-align: center;
      width: 250px;
      transition: 0.3s;
      border-top: 5px solid #F77D0A;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card i {
      color: #F77D0A;
      font-size: 40px;
      margin-bottom: 10px;
    }

    .stat-card h3 {
      margin: 10px 0;
      color: #2B2E4A;
      font-size: 1.5rem;
    }

    .info-section {
      text-align: center;
      padding: 50px 20px;
      background: #fff8f3;
    }

    .info-section h2 {
      color: #F77D0A;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .info-section p {
      max-width: 700px;
      margin: 0 auto;
      font-size: 1.1rem;
      color: #555;
    }

    .contact-box {
      background: white;
      border-radius: 12px;
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
      padding: 30px;
      margin: 50px auto;
      text-align: center;
      width: 80%;
      max-width: 700px;
      border-left: 5px solid #F77D0A;
    }

    .contact-box h3 {
      color: #2B2E4A;
      margin-bottom: 10px;
    }

    .contact-box p {
      color: #555;
    }

    .contact-box a {
      display: inline-block;
      margin-top: 15px;
      background: #F77D0A;
      color: white;
      padding: 10px 25px;
      border-radius: 5px;
      text-decoration: none;
      transition: 0.3s;
    }

    .contact-box a:hover {
      background: #c76408;
    }

    .footer {
      text-align: center;
      padding: 25px;
      color: #777;
      background: #2B2E4A;
      margin-top: 40px;
      font-size: 0.95rem;
      color: #fff;
    }
  </style>
</head>

<body>

  <div class="dashboard-header">
    <h1>Welcome Back, Provider!</h1>
    <p>Your performance summary and support center</p>
  </div>

  <div class="stats-container">
    <div class="stat-card">
      <i class="fas fa-users"></i>
      <h3>1,024+</h3>
      <p>Customers Served This Month</p>
    </div>
    <div class="stat-card">
      <i class="fas fa-star"></i>
      <h3>4.8 / 5</h3>
      <p>Average Rating</p>
    </div>
    <div class="stat-card">
      <i class="fas fa-tools"></i>
      <h3>150+</h3>
      <p>Services Completed</p>
    </div>
    <div class="stat-card">
      <i class="fas fa-check-circle"></i>
      <h3>Approved</h3>
      <p>Provider Status</p>
    </div>
  </div>

  <div class="info-section">
    <h2>Keep Up the Great Work!</h2>
    <p>We’re proud to have you as a verified service provider on <strong>Auto Pit Stop</strong>. Your dedication helps thousands of customers every month. Continue delivering top-notch service — your reliability is what makes this platform thrive!</p>
  </div>

  <div class="contact-box">
    <h3>Need Help or Found an Issue?</h3>
    <p>If something doesn’t seem right with your account or you’re facing any issue, please don’t hesitate to contact our support team. We’re here to assist you 24/7.</p>
    <a href="mailto:support@autopitstop.com"><i class="fas fa-envelope"></i> Contact Support</a>
  </div>

  <div class="footer">
    <p>&copy; 2025 Auto Pit Stop | Provider Support Portal</p>
  </div>

</body>

</html>

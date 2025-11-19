<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Auto Pit Stop - Service Providers</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #F77D0A;
            --dark: #2B2E4A;
            --light: #F4F5F8;
        }

        body {
            font-family: 'Rubik', sans-serif;
            margin: 0;
            background-color: #fff;
        }

        /* Banner Section */
        .carousel-item img {
            filter: brightness(60%);
            object-fit: cover;
            height: 100vh;
        }

        .carousel-caption {
            background: linear-gradient(135deg, rgba(43, 46, 74, 0.7), rgba(0, 0, 0, 0.6));
            border-radius: 15px;
            padding: 40px;
        }

        .carousel-caption h4 {
            color: #FFD580;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
        }

        .carousel-caption h1 {
            font-weight: 700;
            color: #fff;
            font-size: 3rem;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            font-size: 18px;
            font-weight: 600;
            padding: 12px 35px;
            border-radius: 30px;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e36d00;
            transform: scale(1.05);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }

        .carousel-indicators li {
            background-color: var(--primary);
        }

        .contact-note {
            color: #fff;
            margin-top: 15px;
            font-size: 16px;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .carousel-caption h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <!-- Carousel Start -->
    <div id="provider-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#provider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#provider-carousel" data-slide-to="1"></li>
            <li data-target="#provider-carousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Workshop">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4>Welcome Back, Partner!</h4>
                        <h1>You've Served 1,200+ Happy Customers This Month</h1>
                        <a href="mid.php" class="btn btn-primary mt-3">View Performance</a>
                        <div class="contact-note">Need help? Our support team is always ready to assist you.</div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Mechanic">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4>Auto Pit Stop Network</h4>
                        <h1>Reach More Drivers & Build Your Reputation</h1>
                        <a href="viewreq.php" class="btn btn-primary mt-3">Manage Requests</a>
                        <div class="contact-note">Report any issue or feedback directly from your dashboard.</div>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#provider-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#provider-carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- Carousel End -->

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

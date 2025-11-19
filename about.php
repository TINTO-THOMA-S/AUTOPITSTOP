<?php  
include("top.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About - Auto Pit Providers</title>

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: #f4f5f8;
        color: #333;
    }

    .hero {
        background: linear-gradient(rgba(28, 30, 50, 0.8), rgba(28, 30, 50, 0.8)),
                    url('../common/image/about-bg.jpg') center/cover no-repeat;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .hero h1 {
        font-size: 48px;
        color: #F77D0A;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.4);
    }

    .about-section {
        max-width: 1200px;
        margin: 60px auto;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 40px;
    }

    .about-text {
        flex: 1 1 55%;
    }

    .about-text h2 {
        color: #2B2E4A;
        font-size: 32px;
        margin-bottom: 15px;
    }

    .about-text p {
        font-size: 17px;
        line-height: 1.8;
        text-align: justify;
    }

    .about-img {
        flex: 1 1 40%;
        display: flex;
        justify-content: center;
    }

    .about-img img {
        width: 100%;
        max-width: 450px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }

    .about-img img:hover {
        transform: scale(1.05);
    }

    .stats {
        display: flex;
        justify-content: center;
        gap: 50px;
        margin: 60px auto;
        text-align: center;
        flex-wrap: wrap;
    }

    .stat-box {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        width: 220px;
        transition: all 0.3s ease;
    }

    .stat-box:hover {
        background: #F77D0A;
        color: white;
        transform: translateY(-8px);
    }

    .stat-box h3 {
        font-size: 36px;
        margin: 0;
    }

    .stat-box p {
        font-size: 15px;
        margin-top: 10px;
    }

    .cta {
        background: #2B2E4A;
        color: white;
        text-align: center;
        padding: 50px 20px;
        margin-top: 60px;
    }

    .cta h2 {
        font-size: 28px;
        margin-bottom: 15px;
        color: #F77D0A;
    }

    .cta p {
        font-size: 17px;
        margin-bottom: 25px;
    }

    .cta a {
        background: #F77D0A;
        padding: 12px 30px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .cta a:hover {
        background: #d86605;
    }

    @media(max-width: 768px) {
        .about-section {
            flex-direction: column;
            text-align: center;
        }

        .about-img img {
            max-width: 100%;
        }
    }
</style>
</head>

<body>

    <section class="hero">
        <h1>About Our Providers</h1>
    </section>

    <section class="about-section">
        <div class="about-text">
            <h2>Who We Are</h2>
            <p>
                At <strong>AUTO PIT STOP</strong>, we partner with experienced and verified automobile service providers across Kerala.
                Our goal is to make car maintenance effortless — ensuring every vehicle gets professional care when it needs it.
                From routine maintenance to emergency breakdowns, our providers bring top-quality service right to your location.
            </p>
            <p>
                We carefully onboard garages and service partners after thorough verification of their experience, licenses,
                and facilities. Every provider in our network upholds our values of reliability, transparency, and customer satisfaction.
            </p>
        </div>

        
    </section>

    <section class="stats">
        <div class="stat-box">
            <h3>120+</h3>
            <p>Trusted Providers</p>
        </div>
        <div class="stat-box">
            <h3>5000+</h3>
            <p>Vehicles Serviced</p>
        </div>
        <div class="stat-box">
            <h3>98%</h3>
            <p>Customer Satisfaction</p>
        </div>
    </section>

    <section class="cta">
        <h2>Want to Join as a Provider?</h2>
        <p>Partner with AUTO PIT STOP and grow your business with hundreds of car owners who trust us daily.</p>
        <a href="../common/provider_reg.php">Join Now</a>
    </section>

</body>
</html>

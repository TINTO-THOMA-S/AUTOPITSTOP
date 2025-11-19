<?php
include_once("../shares/db/mydatabase.inc");
?>
<?php include("top.php"); ?>

<head>
<meta charset="UTF-8">
<title>Service Review & Feedback</title>
<style>
    /* ===== General Styling ===== */
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #e6f0ff 0%, #ffffff 100%);
        color: #333;
    }

    /* ===== Heading Section ===== */
    .title-container {
        text-align: center;
        margin-top: 60px;
        position: relative;
    }

    .animated-heading {
        font-size: 36px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #00796b;
        position: relative;
        display: inline-block;
        padding-bottom: 12px;
        background: linear-gradient(90deg, #ff6f61, #00796b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .animated-heading::after {
        content: '';
        display: block;
        height: 4px;
        width: 0;
        background: linear-gradient(90deg, #ff6f61, #00796b);
        transition: 0.4s ease;
        border-radius: 2px;
        margin: 4px auto 0;
    }

    .animated-heading:hover::after {
        width: 60%;
    }

    /* ===== Button Styling ===== */
    .a1 {
        display: inline-block;
        background-color: #00796b;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: 0.3s ease;
        box-shadow: 0px 3px 10px rgba(0,0,0,0.2);
    }

    .a1:hover {
        background-color: #005f56;
        transform: translateY(-2px);
    }

    /* ===== Card Layout ===== */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        margin: 60px auto;
        max-width: 1300px;
        padding: 20px;
    }

    .maid-card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        width: 320px;
        overflow: hidden;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
        transition: 0.3s ease;
        backdrop-filter: blur(5px);
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .maid-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 12px 25px rgba(0,0,0,0.15);
    }

    .maid-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 2px solid #00796b;
    }

    .maid-card-content {
        padding: 20px;
        text-align: left;
        flex-grow: 1;
    }

    .maid-card-content h2 {
        margin: 0 0 10px 0;
        font-size: 22px;
        color: #00796b;
        font-weight: 700;
    }

    .maid-card-content p {
        margin: 6px 0;
        font-size: 15px;
        color: #444;
        line-height: 1.5;
    }

    .maid-card-content strong {
        color: #000;
    }

    /* ===== Button Container (bottom) ===== */
    .card-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 15px 0 20px;
    }

    /* ===== Message when no service ===== */
    .no-service {
        text-align: center;
        color: #00796b;
        font-size: 22px;
        font-weight: 500;
        margin-top: 200px;
    }

    /* ===== Responsive ===== */
    @media screen and (max-width: 768px) {
        .maid-card {
            width: 90%;
        }
        .animated-heading {
            font-size: 28px;
        }
        .card-buttons {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>
</head>

<body>
<?php
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    $sql = "SELECT * FROM tbl_service WHERE category LIKE '%$mode%' AND availibility='yes'";
    $tbl = getDatas($sql);

    if ($tbl == null) {
        echo "<div class='no-service'>SERVICE IS CURRENTLY NOT AVAILABLE.......</div>";
    } else {
?>
    <!-- Heading Section -->
    <div class="title-container">
        <h1 class="animated-heading">Car Service Details</h1>
    </div>

    <!-- Card Container -->
    <div class="card-container">
        <?php
        for ($i = 0; $i < count($tbl); $i++) {
            $maid_id = $tbl[$i][1];
            $sql2 = "SELECT * FROM tbl_service_provider WHERE provider_id='$maid_id'";
            $dt = getDatas($sql2);

            if ($dt != null) {
        ?>
            <div class="maid-card">
                <img src="<?php echo $dt[0][9]; ?>" alt="Service Image">

                <div class="maid-card-content">
                    <h2><?php echo $dt[0][1]; ?></h2>
                    <p><strong>Service Type:</strong> <?php echo $tbl[$i][2]; ?></p>
                    <p><strong>District:</strong> <?php echo $tbl[$i][3]; ?></p>
                    <p><strong>City:</strong> <?php echo $tbl[$i][4]; ?></p>
                    <p><strong>Rate:</strong> ₹<?php echo $tbl[$i][5]; ?></p>
                    <p><strong>Description:</strong> <?php echo $tbl[$i][8]; ?></p>
                    <p><strong>Available Days:</strong> <?php echo $tbl[$i][7]; ?></p>
                    <p><strong>Contact:</strong> <?php echo $tbl[$i][6]; ?></p>
                </div>

                <!-- Button Section -->
                <div class="card-buttons">
                    <a href="request.php?id=<?php echo $tbl[$i][0]; ?>&mid=<?php echo $tbl[$i][1]; ?>" class="a1">BOOK NOW</a>
                    <a href="review.php?f=<?php echo $tbl[0][0]; ?>" class="a1">REVIEW</a>
                </div>
            </div>
        <?php
            }
        }
        ?>
    </div>
<?php
    }

}
?>
    
</body>
</html>

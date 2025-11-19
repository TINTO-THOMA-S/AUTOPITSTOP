<?php
session_start();
$user=$_SESSION['userid'];
include_once("../shares/db/mydatabase.inc");
include_once("top.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Approved Services</title>
<style>
    body {
        background: url(../img/L6.jpg) no-repeat top fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        color: #222;
    }

    h1 {
        text-align: center;
        font-size: 30px;
        margin-top: 60px;
        margin-bottom: 20px;
        font-weight: bold;
        color: #ff7b00;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
    }

    /* Card container layout */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 25px;
        padding: 20px;
        width: 95%;
        margin: auto;
    }

    /* Individual square card */
    .service-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        width: 300px;
        min-height: 330px;
        padding: 20px;
        box-shadow: 0 8px 18px rgba(0,0,0,0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        backdrop-filter: blur(4px);
        border-top: 5px solid #ff7b00;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .service-card h3 {
        color: #ff7b00;
        font-size: 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    .service-details {
        margin-top: 10px;
        font-size: 15px;
        line-height: 1.6;
    }

    .service-details strong {
        color: #e65100;
        display: inline-block;
        width: 130px;
    }

    /* Approved badge button */
    .approved-btn {
        display: inline-block;
        background-color: #ff7b00;
        color: white;
        font-weight: bold;
        padding: 8px 18px;
        border-radius: 6px;
        font-size: 15px;
        text-transform: uppercase;
        text-align: center;
        margin-top: 15px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }

    .approved-btn:hover {
        background-color: #e65100;
        transition: 0.3s;
    }

    @media screen and (max-width: 768px) {
        .service-card {
            width: 90%;
        }
        h1 {
            font-size: 22px;
        }
    }
</style>
</head>

<body>

<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");

$sql="select * from tbl_service_provider where email='$user'";
$dt=getDatas($sql);
$uid=$dt[0][0];

$sql="SELECT * FROM tbl_emergency_request WHERE emergency_id='$fid' AND req_status='APPROVED'";
$tbl=getDatas($sql);

if( $tbl[0][0]==''){
    echo "<h1>NO APPROVED LIST UPDATED !!!!</h1>";
} else {
?>

<h1>APPROVED SERVICES INFO</h1>

<div class="card-container">
    <?php
    for($i=0; $i<count($tbl); $i++) {
    ?>
        <div class="service-card">
            <h3><?php echo $tbl[$i][4]; ?></h3>
            <div class="service-details">
                <p><strong>OWNER-NAME:</strong> <?php echo $tbl[$i][5]; ?></p>
                <p><strong>VEHICLE-NO:</strong> <?php echo $tbl[$i][6]; ?></p>
                <p><strong>CONTACT NUM:</strong> <?php echo $tbl[$i][7]; ?></p>
                <p><strong>L0CATION:</strong> <?php echo $tbl[$i][8]; ?></p>
                <p><strong>DATE OF REQUEST:</strong> <?php echo $tbl[$i][9]; ?></p>
                <p><strong>EMERGENCY:</strong> <?php echo $tbl[$i][10]; ?></p>
                <p><strong>ADDRESS:</strong> <?php echo $tbl[$i][11]; ?></p>
            </div>
            <div class="approved-btn"><?php echo $tbl[$i][12]; ?></div>
        </div>
    <?php } ?>
</div>

<?php } ?>

</body>
</html>

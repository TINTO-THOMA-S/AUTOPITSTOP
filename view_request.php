<?php
session_start();
$user=$_SESSION['userid'];
include_once("top.php");
?>
<head>
<style>
    body {
        background: url(s3.jpg) no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 100px auto;
        padding: 20px;
    }

    h1 {
        color: darkorange;
        text-align: center;
        margin-bottom: 40px;
        font-size: 36px;
        text-shadow: 1px 1px 3px black;
    }

    .card {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.3);
        margin-bottom: 25px;
        padding: 25px 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(0,0,0,0.4);
    }

    .card h2 {
        color: #007bff;
        margin-bottom: 10px;
        font-size: 22px;
    }

    .card p {
        font-size: 16px;
        color: #333;
        margin: 5px 0;
    }

    .info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 10px;
        margin-top: 10px;
    }

    .info p span {
        font-weight: bold;
        color: #000;
    }

    .pay-btn {
        margin-top: 15px;
        display: inline-block;
        background-color: #ffc107;
        border: none;
        color: #000;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .pay-btn:hover {
        background-color: #e0a800;
    }

    .no-data {
        color: darkorange;
        font-size: 24px;
        text-align: center;
        margin-top: 150px;
        text-shadow: 1px 1px 2px black;
    }
</style>
</head>

<?php
date_default_timezone_set('Asia/Kolkata');
$date=date("Y_m-d");

$sql="select * from tbl_owner where email='$user'";
$dt=getDatas($sql);
$uid=$dt[0][0];

$sql="select * from tbl_request where user_id='$uid' and pay_status='NULL' ";
$tbl=getDatas($sql);

if($tbl[0][0]==''){
    echo "<h1 class='no-data'>NO SERVICE REQUEST UPDATED !!!!</h1>";
} else {
?>
<div class="container">
    <h1>SERVICE REQUEST DETAILS</h1>

    <?php
    for($i=0;$i<count($tbl);$i++)
    {
        $td=$tbl[$i][1];
        $sql="select * from tbl_service where service_id='$td'";
        $tbl1=getDatas($sql);
        $type=$tbl1[0][2];
        $sid=$tbl1[0][1];

        $sql="select * from tbl_service_provider where provider_id='$sid'";
        $dt=getDatas($sql);    
        $sname=$dt[0][1];   

        $ps=$tbl[$i][12];
    ?>

    <div class="card">
        <h2><?php echo $type; ?></h2>
        <div class="info">
            <p><span>Provider:</span> <?php echo $sname; ?></p>
            <p><span>Required Days:</span> <?php echo $tbl[$i][7]; ?></p>
            <p><span>Total Amount:</span> ₹<?php echo $tbl[$i][8]; ?></p>
            <p><span>Date:</span> <?php echo $tbl[$i][9]; ?></p>
            <p><span>Status:</span> <?php echo $tbl[$i][12]; ?></p>
        </div>

        <?php
        if($ps=="APPROVED"){
        ?>
            <a href="pay.php?a=<?php echo $tbl[$i][0];?>&b=<?php echo  $tbl[$i][8];?>" class="pay-btn">💳 QUICK PAY</a>
        <?php
        } else {
            echo "<p><span>Payment:</span> ---------</p>";
        }
        ?>
    </div>

    <?php 
    }
    ?>
</div>
<?php
}
?>

<?php
if(isset($_GET['a'])){
    $p=$_GET['a'];
    $m=$_GET['m'];
    if($m=="yes"){
        $sql="UPDATE `tbl_service` SET availibility='no' WHERE service_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_serviceinfo.php');
    } else {
        $sql="UPDATE `tbl_service` SET availibility='yes' WHERE service_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_serviceinfo.php');
    }
}
?>

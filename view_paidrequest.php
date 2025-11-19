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
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 80px auto;
        padding: 20px;
    }

    h1 {
        color: #ffcc00;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px black;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        margin-bottom: 30px;
        padding: 30px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 25px rgba(0,0,0,0.4);
    }

    .card h2 {
        color: #007bff;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 15px;
    }

    .info p {
        font-size: 16px;
        color: #333;
        margin: 5px 0;
    }

    .info span {
        font-weight: bold;
        color: #000;
    }

    .print-btn {
        display: block;
        width: fit-content;
        margin: 30px auto;
        padding: 12px 25px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .print-btn:hover {
        background-color: #218838;
    }

    .no-info {
        color: darkorange;
        font-size: 24px;
        text-align: center;
        margin-top: 200px;
        text-shadow: 1px 1px 2px black;
    }

    @media print {
        body {
            background: white;
        }
        .print-btn, .top-nav, .navbar {
            display: none !important;
        }
        .card {
            box-shadow: none;
            border: 1px solid #aaa;
        }
    }
</style>
<script>
function printPage() {
    window.print();
}
</script>
</head>

<?php
date_default_timezone_set('Asia/Kolkata');
$date=date("Y_m-d");

$sql="select * from tbl_owner where email='$user'";
$dt=getDatas($sql);
$uid=$dt[0][0];

$sql="select * from tbl_request where user_id='$uid' and pay_status='PAID'";
$tbl=getDatas($sql);

if($tbl[0][0]==''){
    echo "<h1 class='no-info'>NO INFORMATION !!!!</h1>";
} else {
?>
<div class="container">
    <h1>SERVICE BOOKING DETAILS</h1>

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
    ?>

    <div class="card">
        <h2><?php echo $type; ?> TYPE</h2>
        <div class="info">
            <p><span>Provider Name:</span> <?php echo $sname;?></p>
            <p><span>Category:</span> <?php echo $type;?></p>
            <p><span>Required Days:</span> <?php echo $tbl[$i][7];?></p>
            <p><span>Total Amount:</span> ₹<?php echo $tbl[$i][8];?></p>
            <p><span>Date:</span> <?php echo $tbl[$i][9];?></p>
            <p><span>Request Status:</span> <?php echo $tbl[$i][12];?></p>
            <p><span>Payment:</span> <?php echo $tbl[$i][13];?></p>
        </div>
    </div>

    <?php 
    }
    ?>

    <button class="print-btn" onclick="printPage()">🖨️ Download / Print</button>
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
    }
    else{
        $sql="UPDATE `tbl_service` SET availibility='yes' WHERE service_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_serviceinfo.php');
    }
}
?>

<?php
session_start();
$user = $_SESSION['userid'];
include_once("../shares/db/mydatabase.inc");
include_once("top.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>serviceRequest Info</title>
    <style>
        body {
            background: url(../img/L6.jpg) no-repeat top fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: #e74c3c;
            text-shadow: 1px 1px 5px black;
        }
        .card {
            max-width: 1350px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0,0,0,0.75);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.5);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #555;
        }
        table th {
            background-color: rgba(255,255,255,0.9);
            color: #000;
            font-weight: bold;
            border-radius: 8px;
        }
        table tr:hover {
            background-color: rgba(255,255,255,0.1);
        }
        table td {
            color: #fff;
        }
        a button {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        a button:hover {
            opacity: 0.8;
        }
        .approve-btn {
            background-color: #2ecc71;
            color: white;
        }
        .reject-btn {
            background-color: #e74c3c;
            color: white;
        }
        /* Responsive */
        @media screen and (max-width: 1200px) {
            table th, table td {
                padding: 10px;
                font-size: 14px;
            }
        }
        @media screen and (max-width: 768px) {
            h1 {
                font-size: 24px;
            }
            .card {
                margin: 20px;
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");

$sql = "SELECT * FROM tbl_service_provider WHERE email='$user'";
$dt = getDatas($sql);
$uid = $dt[0][0];



$sql = "SELECT * FROM tbl_emergency_request WHERE emergency_id='$fid' AND req_status='PENDING'";
$tbl = getDatas($sql);

if ($tbl == null || $tbl[0][0] == '') {
    echo "<h1 style='margin-top:300px;color:red;'>NO PENDING REQUESTS FOUND !!!!</h1>";
} else {
?>
    <h1>SERVICES REQUEST INFO</h1>
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>VEHICLE MODEL</th>
                    <th>CAR-OWNER NAME</th>
                    <th>VEHICLE NUMBER</th>
                    <th>PHONE NUMBER</th>
                    <th>LOCATION</th>
                    <th>DATE</th>
                    <th>EMERGENCY REASON</th>
                    <th>ADDRESS</th>
                    <th>REQUEST STATUS</th>
                    <th colspan="2">APPROVAL</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($tbl); $i++) {
                $status = $tbl[$i][12];
            ?>
                <tr>
                    
                    <td><?php echo $tbl[$i][4]; ?></td>
                    <td><?php echo $tbl[$i][5]; ?></td>
                    <td><?php echo $tbl[$i][6]; ?></td>
                    <td><?php echo $tbl[$i][7]; ?></td>
                    <td><?php echo $tbl[$i][8]; ?></td>
                    <td><?php echo $tbl[$i][9]; ?></td>
                    <td><?php echo $tbl[$i][10]; ?></td>
                    <td><?php echo $tbl[$i][11]; ?></td>
                    <td><?php echo $tbl[$i][12]; ?></td>
                    <?php if($tbl[$i][12]=="PENDING"){ ?>
                        <td><a href="?a=<?php echo $tbl[$i][0];?>&m=app"><button class="approve-btn">APPROVE</button></a></td>
                        <td><a href="?a=<?php echo $tbl[$i][0];?>&m=reg"><button class="reject-btn">REJECT</button></a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>

<?php
if(isset($_GET['a'])){
    $p=$_GET['a'];
    $m=$_GET['m'];
                       
    if($m=="app"){
        $sql="UPDATE `tbl_emergency_request` SET req_status='APPROVED' WHERE req_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('emergency_approved.php');
    } else {
        $sql="UPDATE `tbl_emergency_request` SET req_status='REJECTED' WHERE req_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_emergency_request.php');
    }
}
?>

</body>
</html>

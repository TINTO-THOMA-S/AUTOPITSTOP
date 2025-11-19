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
<title>Approved Services</title>
<style>
    body {
        background: url(../img/L6.jpg) no-repeat top fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    h1 {
        text-align: center;
        font-size: 30px;
        margin-top: 60px;
        margin-bottom: 20px;
        font-weight: bold;
        color: linear-gradient(180deg, #FA8500, #0E124D);
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        width: 95%;
        margin: 20px auto;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #343a40;
        color: white;
        font-size: 16px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #dfe6e9;
    }

    td {
        font-size: 15px;
        color: #111;
    }

    .status-paid {
        color: green;
        font-weight: bold;
        font-size: 16px;
    }

    .status-unpaid {
        color: red;
        font-weight: bold;
        font-size: 16px;
    }

    @media screen and (max-width: 1200px) {
        table th, table td {
            padding: 10px;
            font-size: 14px;
        }
        h1 {
            font-size: 24px;
        }
    }

    @media screen and (max-width: 768px) {
        .card {
            padding: 15px;
        }
        table th, table td {
            padding: 8px;
            font-size: 13px;
        }
        h1 {
            font-size: 20px;
        }
    }
</style>
</head>
<body>

<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");

// Verify service provider
$sql = "SELECT provider_id FROM tbl_service_provider WHERE email='$user'";
$dt = getDatas($sql);
if($dt == null){
    echo "<h1>No provider found for this login.</h1>";
    exit;
}
$uid = $dt[0][0];

// Get all services for this provider
$sql = "SELECT service_id FROM tbl_service WHERE provider_id='$uid'";
$services = getDatas($sql);

if($services == null){
    echo "<h1>No services found for this provider.</h1>";
    exit;
}

$service_ids = array_column($services, 0);
$service_id_list = implode(",", $service_ids);

// Get approved requests
$sql = "SELECT * FROM tbl_request WHERE service_id IN ($service_id_list) AND req_status='APPROVED'";
$tbl = getDatas($sql);

if($tbl == null || count($tbl) == 0){
    echo "<h1>NO APPROVED LIST UPDATED !!!!</h1>";
} else {
?>
<h1>APPROVED SERVICES INFO</h1>
<div class="card">
    <table border="1">
        <thead>
            <tr>
                <th>VEHICLE MODEL</th>
                <th>VEHICLE NUMBER</th>
                <th>PHONE NUMBER</th>
                <th>REQUIRED DAYS</th>
                <th>PAYMENT</th>
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th>ADDRESS</th>
                <th>PAYMENT STATUS</th>      
            </tr>
        </thead>
        <tbody>
        <?php
        for($i=0; $i<count($tbl); $i++) {
            $ps = $tbl[$i][13];
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
                <td>
                    <?php
                    $ps = $tbl[$i][13];
                    if($ps == "NULL") {
                        echo '<span class="status-unpaid">NOT PAID</span>';
                    } else {
                        echo '<span class="status-paid">PAID</span>';
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
</body>
</html>

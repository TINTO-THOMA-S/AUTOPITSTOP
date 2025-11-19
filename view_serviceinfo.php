<?php 
session_start(); 
$user = $_SESSION['userid']; 
include_once("../shares/db/mydatabase.inc"); 
include_once("top.php");   
?>  

<head>
<style>
    body {
        background: url(../img/L6.jpg) no-repeat center fixed;
        background-size: cover;
        font-family: "Poppins", sans-serif;
        color: #222;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #c62828;
        font-size: 28px;
        letter-spacing: 1px;
        margin-top: 40px;
        text-transform: uppercase;
    }

    .card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 90%;
        margin: 40px auto;
        padding: 20px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: #212121;
        color: white;
        text-align: center;
        padding: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td {
        text-align: center;
        padding: 12px;
        color: #333;
        background-color: #fdfdfd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e8f5e9;
        transition: 0.3s ease;
    }

    button {
        background-color: #388e3c;
        border: none;
        border-radius: 6px;
        color: white;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #2e7d32;
        transform: scale(1.05);
    }

    button font {
        color: #ff1744;
        font-weight: bold;
    }

    .ss {
        background-color: #1565c0;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
        font-weight: 500;
    }

    .ss:hover {
        background-color: #0d47a1;
        transform: scale(1.05);
    }

    select {
        border: 2px solid #444;
        border-radius: 10px;
        height: 50px;
        width: 300px;
        padding: 5px;
        font-size: 16px;
    }

    label {
        color: white;
        font-size: 18px;
        font-weight: 500;
    }

    @media screen and (max-width: 768px) {
        .card {
            width: 95%;
            padding: 10px;
        }

        th, td {
            font-size: 13px;
            padding: 8px;
        }

        button, .ss {
            font-size: 12px;
            padding: 6px 10px;
        }
    }
</style>
</head>

<!-- user section -->
<?php         
$sql = "select * from tbl_service_provider where email='$user'";
$tbl1 = getDatas($sql); 
$sid = $tbl1[0][0];         

$sql = "select * from tbl_service where provider_id='$sid'";
$tbl = getDatas($sql); 			 	

if($tbl[0][0] == '') {
    echo "<h1 style='color:red;margin-top:150px;'>NO FUEL INFORMATION UPDATED !!!!</h1>";
} else { 
?>
<br><br>
<h1>Updated Service Info</h1>
<div class="card">
    <table border="1">
        <thead>
            <tr>
                <th>Service Type</th>
                <th>District</th>
                <th>City</th>
                <th>Amount</th>
                <th>Contact Number</th>
                <th>Availability</th>
                <th>Update Status</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        for($i=0;$i<count($tbl);$i++) { 
            for($j=0;$j<count($tbl[$i]);$j++) { }
        ?>
            <tr>
                <td><?php echo $tbl[$i][2];?></td>
                <td><?php echo $tbl[$i][3];?></td>
                <td><?php echo $tbl[$i][4];?></td>
                <td><?php echo $tbl[$i][5];?></td>
                <td><?php echo $tbl[$i][6];?></td>
                <td><?php echo $tbl[$i][9];?></td>
                <?php
                    $td = $tbl[$i][0];
                    $sql = "select availibility from tbl_service where service_id='$td'";
                    $tbl1 = getDatas($sql);
                    $m = $tbl1[0][0];
                    if($m == "yes"){
                ?>
                        <td><a href="?a=<?php echo $tbl[$i][0];?>$&m=yes"><button>NO</button></a></td>
                <?php } else { ?>
                        <td><a href="?a=<?php echo $tbl[$i][0];?>$&m=no"><button><font color="red">YES</font></button></a></td>
                <?php } ?>
                <td><a href="update_amount.php?id=<?php echo $tbl[$i][0];?>" class="ss">EDIT</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php 
if(isset($_GET['a'])) {
    $p = $_GET['a'];
    $m = $_GET['m'];
    if($m == "yes") {
        $sql = "UPDATE tbl_service SET availibility='no' WHERE service_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_serviceinfo.php');
    } else {
        $sql = "UPDATE tbl_service SET availibility='yes' WHERE service_id='$p'";
        setDatas($sql);
        msgbox("Success");
        nextpage('view_serviceinfo.php');
    }
}
?>

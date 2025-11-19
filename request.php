<?php
session_start();
$user=$_SESSION['userid'];

include("../shares/db/mydatabase.inc");
include("top.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Car Service Request</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .request-container {
            max-width: 700px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .request-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #e74c3c;
        }
        .request-container p {
            margin: 0 0 5px;
            font-weight: bold;
            color: #555;
        }
        .request-container input[type=text],
        .request-container input[type=number] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }
        .request-container input[type=text]:focus,
        .request-container input[type=number]:focus {
            border-color: #e74c3c;
            outline: none;
        }
        .request-container input[type=submit] {
            width: 100%;
            padding: 15px;
            background-color: #e74c3c;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
        .request-container input[type=submit]:hover {
            background-color: #c0392b;
        }
        /* Responsive */
        @media screen and (max-width: 768px) {
            .request-container {
                margin: 40px 20px;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $mid=$_GET['mid'];
    }
    ?>
    <div class="request-container">
        <h1>CAR SERVICE REQUEST</h1>
        <form action="" method="post">
            <p>VEHICLE MODEL</p>
            <input type="text" name="name" />

            <p>VEHICLE NUMBER</p>
            <input type="text" name="current" required />

            <p>NEEDED DAYS</p>
            <input type="number" name="quantity" required />
            <input type="hidden" name="fid" value="<?php echo $id;?>" />
            <input type="hidden" name="maidid" value="<?php echo $mid;?>" />

            <p>CONTACT NUMBER</p>
            <input type="text" name="num" required />

            <p>DESCRIPTION</p>
            <input type="text" name="des" required />

            <p>ADDRESS</p>
            <input type="text" name="address" required />

            <input type="submit" value="REQUEST" />
        </form>
    </div>

<?php
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $cur=$_POST['current'];
    $qun=$_POST['quantity'];
    $num=$_POST['num'];
    $maidinfo_id=$_POST['fid'];
    $maidid=$_POST['maidid'];
    $address=$_POST['address'];
    $des=$_POST['des'];

    $sql="select * from tbl_services where service_id='$id'";
    $tbl=getDatas($sql);
    $amnt=$tbl[0][5];
    $tot = $amnt; 

    date_default_timezone_set('Asia/Kolkata');
    $date=date("d-m-Y");

    $sql="select * from tbl_owner where email='$user'";
    $dt=getDatas($sql);
    $uid=$dt[0][0];

    $sql="INSERT INTO `tbl_request`(`service_id`, `provider_id`, `user_id`, `vehicle model`, `vehiclenumber`, `phn_num`, `days`, `amount`, `date`, `description`, `address`, `req_status`, `pay_status`) VALUES ('$maidinfo_id','$maidid','$uid','$name','$cur','$num','$qun','$tot','$date','$des','$address','PENDING','NULL')";
        
    setDatas($sql);
    msgbox("Success!!");
}
?>
</body>
</html>

<?php  
session_start();
$user=$_SESSION['userid'];
include("top.php");
include("../shares/db/mydatabase.inc"); 
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Services</title>
<style>
/* Body Styling */
body {
    margin: 0;
    padding: 0;
    background: var(--light, #F4F5F8);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Main Container */
.container1 {
    max-width: 700px;
    margin: 80px auto;
    padding: 40px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(43, 46, 74, 0.15);
    border-top: 5px solid #F77D0A;
    transition: all 0.3s ease;
}

.container1:hover {
    transform: translateY(-3px);
}

/* Heading */
.container1 h1 {
    text-align: center;
    color: #2B2E4A;
    margin-bottom: 25px;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* Label Styles */
label {
    color: #2B2E4A;
    font-weight: 600;
    display: block;
    margin-top: 12px;
    margin-bottom: 5px;
}

/* Input Fields & Select */
input[type=text],
input[type=password],
input[type=email],
input[type=date],
select {
    width: 100%;
    padding: 12px 14px;
    border: 1.8px solid #ddd;
    border-radius: 8px;
    background-color: #fafafa;
    font-size: 15px;
    transition: 0.3s ease;
}

input:focus,
select:focus {
    border-color: #F77D0A;
    background-color: #fff;
    outline: none;
    box-shadow: 0 0 6px rgba(247, 125, 10, 0.3);
}

/* Button */
.registerbtn {
    background-color: #F77D0A;
    color: #fff;
    padding: 14px;
    margin-top: 25px;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 17px;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.registerbtn:hover {
    background-color: #2B2E4A;
    transform: scale(1.03);
}

/* Placeholder */
::placeholder {
    color: #999;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .container1 {
        width: 90%;
        padding: 25px;
    }
    .container1 h1 {
        font-size: 22px;
    }
}
</style>
</head>
<body>

<?php   
$sql="select * from tbl_service_provider where email='$user'";
$tbl=getDatas($sql);
$fid=$tbl[0][0];
$sname=$tbl[0][1];
?>

<div class="container1">
    <h1>ADD SERVICES</h1>
    <form action="" method="post" data-toggle="validator" enctype="multipart/form-data">

        <label for="firstname">SERVICE NAME:</label>
        <input type="text" name="name" value="<?php echo $sname;?>" readonly>
        <input type="hidden" name="fid" value="<?php echo $fid;?>">

        <label for="house">CATEGORY:</label>
        <select name="category" required>
            <option value="">--Select--</option>
            <?php
            $sql="SELECT * FROM add_category";
            $tbl=getDatas($sql);
            foreach($tbl as $row){
            ?> 
            <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
            <?php } ?>
        </select>

        <label for="district">DISTRICT:</label>
        <input type="text" name="district" placeholder="Enter District" required>

        <label for="city">CITY:</label>
        <input type="text" name="city" placeholder="Enter City" required>

        <label for="pincode">AMOUNT:</label>
        <input type="text" name="amount" placeholder="Enter Amount" required>

        <label for="mobile">CONTACT NUMBER:</label>
        <input type="text" name="mobile" placeholder="Enter Mobile Number" required>

        <label for="days">NEEDED DAYS:</label>
        <input type="text" name="days" placeholder="Enter Required Days" required>

        <label for="description">DESCRIPTION:</label>
        <input type="text" name="description" placeholder="Enter Description" required>

        <button type="submit" class="registerbtn">Submit</button>
    </form>
</div>

<script src="../Student_reg_temp/web/js/jquery-2.1.4.min.js"></script>
<script src="../Student_reg_temp/web/js/bootstrap.min.js"></script>
<script src="../Student_reg_temp/web/js/validator.min.js"></script>

</body>
</html>

<?php
if(isset($_POST['name']))
{
    $b=$_POST['name'];
    $c=$_POST['fid'];
    $d=$_POST['district'];
    $e=$_POST['city'];
    $f=$_POST['amount'];
    $g=$_POST['mobile'];
    $h=$_POST['category'];
    $i=$_POST['days'];
    $j=$_POST['description'];

    $sql="insert into tbl_service(`service_id`,`provider_id`,`category`,`district`,`city`,`amount`,`mobileno`,`days`, `description`,`availibility`) 
    values('$b','$c','$h','$d','$e','$f','$g','$i','$j','yes')";
    setDatas($sql);
    msgbox("Successfully registered!");
    nextpage("view_serviceinfo.php");
}
?>

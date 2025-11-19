<?php  
session_start();
$user=$_SESSION['userid'];
include("top.php");
include("../shares/db/mydatabase.inc"); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Feedback Form</title>
<style>
body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background: url(../img/f3.webp) no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
}

/* Feedback Form Container */
.feedback-card {
    max-width: 600px;
    background: rgba(255, 255, 255, 0.95);
    margin: 120px auto;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

/* Headings */
.feedback-card h1 {
    text-align: center;
    color: #17c3a2;
    margin-bottom: 30px;
    font-size: 32px;
}

/* Form fields */
.feedback-card label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #2c3e50;
}

.feedback-card input[type=text],
.feedback-card input[type=email],
.feedback-card textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
}

/* Radio buttons */
.feedback-card .radio-group {
    margin-bottom: 20px;
}

.feedback-card .radio-group input[type=radio] {
    margin-right: 8px;
    margin-left: 15px;
    transform: scale(1.2);
}

.feedback-card .radio-group label {
    display: inline-block;
    margin-right: 20px;
    color: #2c3e50;
}

/* Submit button */
.feedback-card input[type=submit] {
    background-color: #17c3a2;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 18px;
    transition: 0.3s;
    display: block;
    margin: 0 auto;
}

.feedback-card input[type=submit]:hover {
    background-color: #138f80;
}

/* Responsive */
@media (max-width: 600px) {
    .feedback-card {
        margin: 80px 20px;
        padding: 20px;
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

<div class="feedback-card">
    <h1>Feedback Form</h1>
    <form action="" method="post" enctype="multipart/form-data">
                <label for="firstname">PROVIDER NAME:</label>
        <input type="text" name="name" value="<?php echo $sname;?>" readonly>
        <input type="hidden" name="fid" value="<?php echo $fid;?>">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label>Feedback Type:</label>
        <div class="radio-group">
            <input type="radio" name="feedbacktype" value="comment" id="comment" required>
            <label for="comment">Comment</label>

            <input type="radio" name="feedbacktype" value="bugreports" id="bugreports">
            <label for="bugreports">Bug Reports</label>

            <input type="radio" name="feedbacktype" value="questions" id="questions">
            <label for="questions">Questions</label>
        </div>

        <label for="describefeedback">Describe Feedback:</label>
        <textarea name="describefeedback" id="describefeedback" rows="4" required></textarea>

        <input type="submit" value="Submit Feedback">
    </form>
</div>

</body>
</html>
<?php
if(isset($_POST['name']))
{
    $b=$_POST['name'];
    $c=$_POST['fid'];
 $n2=$_POST['email'];
    $n3=$_POST['feedbacktype'];
    $n4=$_POST['describefeedback'];
    
    $sql="insert into tbl_feedback(`feed_id`,`provider_id`,`email`,`type`,`comment`) 
    values('$b','$c','$n2','$n3','$n4')";
    
    setDatas($sql);
    msgbox('success');
}
?>

<?php
session_start();
$user = $_SESSION['userid']; 
include("../shares/db/mydatabase.inc"); 
include("top.php");
?>

<style>
input,textarea,select{
                border: 2px solid;
             border-radius: 4px;
             width: 100%;
           
             
            }
    body{
        background-image:url(../common/image/bg1.jpg);
        background-repeat: no-repeat;
      background-size: cover;
    }
            label{
                color: green;
                font-size: 20px;
            }
            table{
                padding-bottom:1em;
                width: 500px;
                height: 200px;
            }
            .div1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    margin: auto;
   padding: 30px;
    width:50%;
}
input[type=submit] {
    background-color: tomato;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    width:100px;
}

input[type=submit]:hover {
    background-color: #ac2925;
}
</style>
<body>
<center>

<p align= "right">
    <h3 style="position: relative;top:150px;left:20px;color:red">Change Password </h3>

<font style="font-size:30;color:black;"><b>

<form method="post" action="">
<table cellspacing="10" cellpadding="5" style="position:relative;top:170px;">
<tr>
<td><font style="font-size:20;color:black;"><b><i> Old Password</td><td><input type= "password" name ="t1" /></i></b></td>
</tr>
<tr><td><font style="font-size:20;color:black;"><b><i>New Password </td><td><input type= "password" name="t2" /></i></b></td></tr>
<tr><td><font style="font-size:20;color:black;"><b><i>Confirm New Password </td><td><input type= "password" name="t3" /></i></b></td></tr>

<tr><td><center></td><td><input type="submit" value="submit" /></b></i></td></tr>
</b>
</table>
</center>
</form>

<?php
if(isset($_POST["t1"])){
	$oldpwd=$_POST["t1"];
	
	$newpwd=$_POST["t2"];
$cpwd=$_POST["t3"];	
$sql="select password from tbl_login where password='$oldpwd' and username='$user'";
$tbl=getDatas($sql);
echo $dt[0][0];

if($tbl!=null)
{
	if($newpwd==$cpwd)
	{
$sql2="update tbl_login set password='$newpwd' where username='$user' and usertype='provider'";

setDatas($sql2);
echo"<script>alert('Success');</script>"; 
	}
	else{
		msgbox('password mismatch');
	}
}
}

?>
</body>
</html>
 

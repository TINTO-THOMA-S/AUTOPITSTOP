<?php include_once("../shares/db/mydatabase.inc");
include("top.php");
?>
<html>
<head>
<title>category form</title>
<style>

input[type=text]
{
	border-radius:3px;
	height:50px;
	width:300px;
    background-color:white;
}

input[type=submit],input[type=reset]
{
    margin: auto;
    padding: 10px 25px;
    margin-top: 25px;
    background-color: #146eb4;
    color: white;
	border:none;
	outline:none;
    letter-spacing: 1px;
    outline: 0;
    cursor: pointer;
    }
input[type=submit]:hover,input[type=reset]:hover
{
	background-color: #ff9900;
    color: white;
}
.heading h1 {
    font-weight: 600;
    top:60px;
    letter-spacing: .5px;
    font-size: 40px;
    margin-bottom: .9em;
    text-align: center;
    color: #ff9900;
    text-transform: uppercase;
    position: relative;
    margin-top: 0;
    
}
.container_1 {
    background-color:beige;
    top:40px;
	width: 710px;
    margin: auto;
    padding: 30px 30px 30px;
    box-sizing: border-box;
   -webkit-box-shadow: 0 0 40px #aaa;
    -moz-box-shadow: 0 0 40px #aaa;
    box-shadow: 0 0 40px #aaa;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -webkit-box-shadow: 0px 1px 8px 0px rgba(158, 158, 158, 0.75);
    -moz-box-shadow: 0px 1px 8px 0px rgba(158, 158, 158, 0.75);
    box-shadow: 0px 1px 8px 0px rgba(158, 158, 158, 0.75);
    background: rgb(0, 0, 0); /* Fallback color */
    background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
    color:whitesmoke;

}
    
    body{
        background:url(../common/bg1.jpg) no-repeat top fixed ;
        background-size:cover;
        height: 1100px;
        
    }
input[type=text]:hover{
    background-color: white;
    }
    label{
        color: whitesmoke;
    }
table
{
	border-radius:3px;	
	height:200px;
    
}


</style>
</head>
    <?php
$sql="select ifnull(max(category_id),0)+1 from add_category";
$tbl=getDatas($sql);
?>
<body>
    <br>
<center>
<div class="container_1">
<form action="" method="POST" >
<table>
    <br>
    <div class="heading">
        <h1>CATEGORY</h1></div><br>
<tr>
<td>
<label>CATEGORY ID :</label>
</td><td>
<input type="text" name="category_id" value="<?php echo $tbl[0][0];?>" readonly=""></td>
</tr>
<tr>
<td>
<label>CATEGORY NAME:</label></td>
<td><input type="text" name="category_name" title="Must contain text values only" required></td>
    </tr>

</table>
      <input type="submit" name="submit" value="SAVE">&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="reset" name="reset" value="RESET">
    </form></div></center>
</body></html>
<?php

if(isset($_POST['category_id']))
{
$a=$_POST['category_id'];
$b=$_POST['category_name'];

$sql="select * from add_category where category_name='$b'";
$tbl=getDatas($sql);
$dep=$tbl[0][0]; 
    
if($dep>0)
{    
    msgbox("Category already exists");
}
    else
    {
    
$sql="insert into add_category values('$a','$b')";
setDatas($sql);
		
    msgbox('Success');
        nextpage("view_category.php");
}
}
?>

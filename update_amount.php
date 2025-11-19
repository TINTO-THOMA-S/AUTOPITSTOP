
<?php
session_start();
include("../shares/db/mydatabase.inc");
include("top.php");
?><html>
	<head>
<style>
    body{
        background-color: beige;
    }
* {
  box-sizing: border-box;
}
    label{
        color: red;
    }
/* Add padding to containers */
.container1 {
  padding: 16px;
  background-color: azure;
    width:1100px;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}
    p{
        color: red;
    }
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

</head>	
    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="select * from tbl_service where service_id='$id'";
        $tbl=getDatas($sql);
        $amnt=$tbl[0][5];
    }
    
    ?>
    
    <div class="container1" style="position:relative;width:1000px;left:400px;top:150px">
                <h1>
               UPDATE AMOUNT
                </h1>
				<form action="" method="post">
					<div class="">
						<p>OLD PRICE </p>
						<input type="text" class="name" name="old" value="<?php echo $amnt;?>" />
					</div>
					<div class="">
						<p>NEW PRICE</p>
						<input type="text" class="password" name="new" required="" />
					</div>
					
					<input type="submit" value="UPDATE">
					<div class="register-forming">

					</div>
				</form>
			</div>

		<?php
    if(isset($_POST['old'])){
        $old=$_POST['old'];
        $new=$_POST['new'];
        $sql="update tbl_service set amount='$new' where service_id='$id'";
        setDatas($sql);
       // msgbox("Suucess!!");
        nextpage("view_serviceinfo.php");
    }
    
    ?>

<?php
session_start();
$user=$_SESSION['userid'];
//include_once("../shares/db/mydatabase.inc");
?>
<?php include("top.php");?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}body{
        background-color: beige;
        background-size: cover;
        height: 1200px;
    }
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
 input[type=submit],input[type=reset]{
         background-color:bisque;
         color: green;
         height:50px;
        width: 100%;
         border: none;
         border-radius: 4px;
     }
     input[type=submit]:hover,input[type=reset]:hover{
         background-color: aquamarine;
     }
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn1 {
  background-color: #4CAF50;
  color:black;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn1:hover {
  background-color: #45a049;
	
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<br><br><br>
<?php
   if(isset($_GET['a'])){
        $vid=$_GET['a'];
        $tot=$_GET['b'];
     
       $sql="select * from tbl_owner where email='$user'";
         $kk=getDatas($sql);
         $sid=$kk[0][0];
       
  
   ?>
    
<div class="row" style="position:relative;width:600px;left:320px;top:30px;">
  <div class="col-75">
    <div class="container2">
      <form action="" method="post">
      
        <div class="row">
          

          <div class="col-50">
            <h3>Payment for Service </h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
              <label for="cname">Amount TO Pay</label>
            <input type="text" id="cname" name="amount" value="<?php echo $tot;?>">
               <input type="text" id="cname" name="id" hidden value="<?php echo $vid;?>">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname"   placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required="" maxlength="16">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" maxlength="3" required>
              </div>
            </div>
          </div>
          
        </div>
       
        <input type="submit" value="Continue to checkout" >
      </form>
    </div>
  </div>
  
</div>

</body>
</html>
<?php
if(isset($_POST['amount'])){
    $a=$_POST['amount'];
    $pid=$_POST['id'];
   //echo $pid;
    date_default_timezone_set('Asia/Kolkata');
     $date=date("Y_m-d");
    $sql="update tbl_request set pay_status='PAID' where request_id='$pid'";
		setDatas($sql);
	
    msgbox('success');
	nextpage("view_paidrequest.php");
    
}
   }
    
   

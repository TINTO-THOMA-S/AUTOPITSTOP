<?php
include_once("../shares/db/mydatabase.inc");
include("top.php");
?>
<head>
<style>
                             

table
{
	
	border:2px solid #17c3a2;
	border-collapse;
    border-radius: 6px;
}
th
{
	color:black;
	background-color:burlywood;
    height: 50px;
    text-align:center;
    
}
    
   td{
       	color:black;
	background-color:beige;
    height: 40px;
   	text-align:center;
   }tr{
   	text-align:center;
   }
   
</style>
</head>

 <?php
$sql="select * from tbl_feedback";
$tbl=getDatas($sql);
if($tbl==null)
{
   echo "<div style='position:relative;top:350px;color:blue;left:620px;font-size:25px;'>NO FEEDBACKS ADDED.......</div>";}
else
{
	?>
	<h1 style="position: relative;left:600px;top:60px;color:#17c3a2;">VIEW FEEDBACKS</h1>
	<table border="4"style="position:relative;left:250px;width:1250px;top:80px;">
	<tr>
	<th>PROVIDER NAME</th>	
	<th>MOBILE NUMBER</th>	
	<th>EMAIL</th>	
	<th>FEEDBACK TYPE</th>
	<th>FEEDBACK</th>

	
</tr>
	<?php
		for($i=0;$i<count($tbl);$i++)
	{
for($j=0;$j<count($tbl[$i]);$j++)
{
}
        $provider=$tbl[$i][1];
      // echo $seller;
        $sql="SELECT `company_name`, `phone` FROM `tbl_service_provider` WHERE `provider_id`='$provider'";
        $tb=getDatas($sql);
        $name=$tb[0][0];
        $mob=$tb[0][1];
       // echo $name;
	?>

<tr>
    <td><?php echo $name;?></td>
<td><?php echo $mob ;?></td>



<td><?php echo $tbl[$i][2];?></td>
<td><?php echo $tbl[$i][3];?></td>
    <td><?php echo $tbl[$i][4];?></td>


</tr>
<?php
}
}

?>
	
</table>

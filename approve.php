<?php  
include("top.php");
include_once("../shares/db/mydatabase.inc");
?>
<html>
<head> 
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0; /* removed margin to align with top.php */
        background-color: #f5f7fa;
    }
    .container {
        padding: 30px;
    }
    h1 {
        text-align: center;
        color: #e61212;
        margin-bottom: 30px;
    }
    table {
        width: 0%;
        margin: 0 auto;
       
        border-collapse: collapse;
        font-size: 16px;
        background-color: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        padding: 14px 20px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #e61212;
        color: #ffffff;
        text-transform: uppercase;
    }
    tbody tr:nth-child(even) { background-color: #f9f9f9; }
    tbody tr:hover { background-color: #fdecec; transition: 0.3s ease; }
    img { border-radius: 6px; }
    a.btn {
        padding: 6px 14px;
        border-radius: 6px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
    }
    .approve { background: #28a745; }
    .reject { background: #dc3545; }
    .approve:hover { background: #218838; }
    .reject:hover { background: #c82333; }
</style>
</head>
<body>

<div class="container">
<?php
$sql = "select tbl_service_provider.*,tbl_login.* from tbl_service_provider join tbl_login on tbl_service_provider.email=tbl_login.username where tbl_login.status='0' ";
$tbl = getDatas($sql);

if ($tbl == null) {
    echo "<div style='text-align:center;color:red;font-size:20px;'>NO NEW REGISTRATIONS...</div>";
} else {
    echo "<h1>Pending Service Providers</h1>";
    echo "<table border='1'>";
    echo "<tr>
                <th>Profile</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Experience</th>
            <th>Proof</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Website</th>
            <th>License No</th>

            <th colspan='2'>Action</th>
          </tr>";

    foreach ($tbl as $row) {
        echo "<tr>";
        echo "<td><img src='".$row[9]."' width='100' height='100'></td>";  // profile
        echo "<td>".$row[1]."</td>";  // company_name
        echo "<td>".$row[2]."</td>";  // address
        echo "<td>".$row[3]."</td>";  // experience
        echo "<td><img src='".$row[4]."' width='100' height='100'></td>";  // proof
        echo "<td>".$row[5]."</td>";  // phone
        echo "<td>".$row[6]."</td>";  // email
        echo "<td>".$row[7]."</td>";  // website
        echo "<td>".$row[8]."</td>";  // license_number
        
        echo "<td><a class='btn approve' href='?email=".$row[6]."&mod=act'>Approve</a></td>";
        echo "<td><a class='btn reject' href='?email=".$row[6]."&mod=inact'>Reject</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<?php
if(isset($_GET['email'])){
    $fid=$_GET['email']; // email
    $mod=$_GET['mod'];   // action
    if($mod=='act'){
        $sql="update tbl_login set status='1' where username='$fid'";
        setDatas($sql);
        msgbox("Provider Approved Successfully");
        nextPage("view_provider.php");
    } else {
        $sql="update tbl_login set status='0' where username='$fid'";
        setDatas($sql);
        msgbox("Provider Rejected");
        nextPage("view_provider.php");
    }
}
?>
</div>

</body>
</html>

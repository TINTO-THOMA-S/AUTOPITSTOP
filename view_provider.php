<?php  
include("top.php");
include_once("../shares/db/mydatabase.inc");
?>
<html>
<head> 
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1C1E32 0%, #2B2E4A 100%);
        background-attachment: fixed;
        color: #333;
        position: relative;
        min-height: 100vh;
        =
    }

    /* Subtle background overlay with a car image (replace URL if needed) */
    body::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('car.jpg');
        opacity: 0.05;
        z-index: 0;
    }

    .container {
        position: relative;
        z-index: 1;
        padding: 60px 20px;
        max-width: 1200px;
        margin: auto;
    }

    h1 {
        text-align: center;
        color: #F77D0A;
        font-size: 36px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 40px;
        text-shadow: 0 0 10px rgba(247, 125, 10, 0.4);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }

    table:hover {
        transform: scale(1.01);
    }

    th, td {
        padding: 14px 12px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    th {
        background-color: #F77D0A;
        color: white;
        text-transform: uppercase;
        font-size: 15px;
        letter-spacing: 1px;
    }

    tbody tr:nth-child(even) {
        background-color: #f7f7f7;
    }

    tbody tr:hover {
        background-color: rgba(247, 125, 10, 0.1);
        transition: 0.3s;
    }

    img {
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    a.btn {
        padding: 8px 18px;
        border-radius: 30px;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    a.btn.remove {
        background: #dc3545;
    }

    a.btn.remove:hover {
        background: #b71c1c;
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.6);
        transform: scale(1.05);
    }

    .no-data {
        text-align: center;
        color: #fff;
        font-size: 22px;
        margin-top: 100px;
        background: rgba(0, 0, 0, 0.3);
        padding: 20px;
        border-radius: 10px;
        display: inline-block;
    }

    /* Responsive Table */
    @media (max-width: 992px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead tr {
            display: none;
        }

        tr {
            margin-bottom: 20px;
            border: 2px solid #eee;
            border-radius: 10px;
            background: #fff;
            padding: 10px;
        }

        td {
            border: none;
            position: relative;
            padding-left: 45%;
            text-align: left;
            font-size: 14px;
        }

        td:before {
            position: absolute;
            top: 10px;
            left: 15px;
            width: 40%;
            white-space: nowrap;
            font-weight: 600;
            color: #F77D0A;
        }

        td:nth-of-type(1):before { content: "Profile"; }
        td:nth-of-type(2):before { content: "Company Name"; }
        td:nth-of-type(3):before { content: "Address"; }
        td:nth-of-type(4):before { content: "Experience"; }
        td:nth-of-type(5):before { content: "Proof"; }
        td:nth-of-type(6):before { content: "Phone"; }
        td:nth-of-type(7):before { content: "Email"; }
        td:nth-of-type(8):before { content: "Website"; }
        td:nth-of-type(9):before { content: "License No"; }
        td:nth-of-type(10):before { content: "DELETE"; }
    }
</style>
</head>
<body>
<div class="container">
<?php
$sql = "SELECT tbl_service_provider.*, tbl_login.* 
        FROM tbl_service_provider 
        JOIN tbl_login ON tbl_service_provider.email = tbl_login.username 
        WHERE tbl_login.status = '1'";
$tbl = getDatas($sql);

if ($tbl == null) {
    echo "<div class='no-data'>NO NEW REGISTRATIONS...</div>";
} else {
    echo "<h1>Service Providers</h1>";
    echo "<table>";
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
             <th>Delete</th>
          </tr>";

    foreach ($tbl as $row) {
        echo "<tr>";
        echo "<td><img src='".$row[9]."' width='80' height='80'></td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td><img src='".$row[4]."' width='80' height='80'></td>";
        echo "<td>".$row[5]."</td>";
        echo "<td>".$row[6]."</td>";
        echo "<td>".$row[7]."</td>";
        echo "<td>".$row[8]."</td>";
        echo "<td><a class='btn remove' href='?email=".$row[6]."&action=delete'>Remove</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<?php
if(isset($_GET['email']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
    $fid = $_GET['email'];
    $sql = "DELETE FROM tbl_service_provider WHERE email='$fid'";
    setDatas($sql);
    $sql = "DELETE FROM tbl_login WHERE username='$fid'";
    setDatas($sql);
    msgbox('Provider removed successfully');
    nextPage('view_provider.php');
}
?>
</div>
</body>
</html>

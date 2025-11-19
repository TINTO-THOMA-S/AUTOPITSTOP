<?php
session_start();
$user = $_SESSION['userid']; // email stored in session
include_once("../shares/db/mydatabase.inc");
include("top.php");
?>

<head>
<style>
    body {
        background: linear-gradient(90deg, #FA8500, #0E124D);
        background-attachment: fixed;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0px 0;
    }

    .card {
        max-width: 700px;
        background: rgba(255, 255, 255, 0.95);
        margin: 50px auto;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        padding: 40px;
        text-align: center;
        backdrop-filter: blur(8px);
    }

    .img1 {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        display: block;
        margin: 0 auto 25px auto;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 4px solid #fff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    td {
        padding: 12px 10px;
        text-align: left;
        font-size: 17px;
        color: #2c3e50;
    }

    label {
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        background: linear-gradient(90deg, #FA8500, #0E124D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    b {
        color: tomato;
        font-weight: 600;
        text-transform: capitalize;
    }

    .aa {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 28px;
        background: linear-gradient(90deg, #FA8500, #0E124D);
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        letter-spacing: 0.5px;
        box-shadow: 0 6px 15px rgba(255, 75, 43, 0.4);
        transition: all 0.3s ease;
    }

    .aa:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(255, 75, 43, 0.6);
    }

</style>
</head>

<body>

<?php
// ✅ fetch provider details from tbl_serviceprovider
$sql = "SELECT * FROM tbl_service_provider WHERE email='$user'";
$tbl = getDatas($sql);

if ($tbl != null && count($tbl) > 0) {
    $provider_id   = $tbl[0][0];
    $company_name  = $tbl[0][1];
    $address       = $tbl[0][2];
    $experience    = $tbl[0][3];
    $proof         = $tbl[0][4];
    $phone         = $tbl[0][5];
    $email         = $tbl[0][6];
    $website       = $tbl[0][7];
    $license       = $tbl[0][8];
    $image         = $tbl[0][9];
?>
    <div class="card">
        <img src="../uploads/<?php echo $image; ?>" class="img1" alt="Profile Image">
        <table>
            <tr><td><label>Company:</label></td><td><b><?php echo $company_name; ?></b></td></tr>
            <tr><td><label>Email:</label></td><td><b><?php echo $email; ?></b></td></tr>
            <tr><td><label>Phone:</label></td><td><b><?php echo $phone; ?></b></td></tr>
            <tr><td><label>Address:</label></td><td><b><?php echo $address; ?></b></td></tr>
            <tr><td><label>Experience:</label></td><td><b><?php echo $experience; ?> years</b></td></tr>
            <tr><td><label>Website:</label></td><td><b><?php echo $website; ?></b></td></tr>
            <tr><td><label>License No:</label></td><td><b><?php echo $license; ?></b></td></tr>
        </table>
        <a class="aa" href="edit_profile.php"><b>Edit Profile</b></a>
    </div>
<?php
} else {
    echo "<div class='card'><h3>No profile details found!</h3></div>";
}
?>
</body>

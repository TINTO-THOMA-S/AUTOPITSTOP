<?php
session_start();
$user = $_SESSION['userid']; // email stored in session
include_once("../shares/db/mydatabase.inc");
include("top.php");
?>

<head>
<style>
    body {
        background: linear-gradient(135deg, #2B2E4A 40%, #F77D0A 120%);
        background-attachment: fixed;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0px 0;
    }

    .card {
        max-width: 600px;
        background: #ffffff;
        margin: 0 auto;
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        padding: 35px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    }

    .img1 {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #F77D0A;
        box-shadow: 0 0 15px rgba(247, 125, 10, 0.4);
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        text-align: left;
        font-size: 16px;
        color: #333;
    }

    label {
        font-weight: bold;
        color: #2B2E4A;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 14px;
    }

    b {
        color: #444;
        font-weight: 600;
    }

    .aa {
        display: inline-block;
        margin-top: 25px;
        padding: 12px 30px;
        background-color: #F77D0A;
        color: white;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
        box-shadow: 0 4px 12px rgba(247, 125, 10, 0.4);
        transition: all 0.3s ease;
    }

    .aa:hover {
        background-color: #2B2E4A;
        box-shadow: 0 4px 15px rgba(43, 46, 74, 0.4);
    }

    .profile-header {
        background: linear-gradient(90deg, #2B2E4A, #F77D0A);
        color: white;
        padding: 10px;
        border-radius: 10px;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }
</style>

</head>
<body>

<?php
// fetch owner details from tbl_owner using session email
$sql = "SELECT * FROM tbl_owner WHERE email='$user'";
$tbl = getDatas($sql);

if ($tbl != null) {
    $owner_id = $tbl[0][0];
    $name     = $tbl[0][1];
    $email    = $tbl[0][2];
    $address  = $tbl[0][3];
    $phone    = $tbl[0][4];
    $img      = $tbl[0][5];
?>
    <div class="card">
        <img src="<?php echo $img; ?>" class="img1" alt="Profile Image">
        <table>
            <tr><td><label>Name:</label></td><td><b><?php echo $name; ?></b></td></tr>
            <tr><td><label>Email:</label></td><td><b><?php echo $email; ?></b></td></tr>
            <tr><td><label>Address:</label></td><td><b><?php echo $address; ?></b></td></tr>
            <tr><td><label>Phone:</label></td><td><b><?php echo $phone; ?></b></td></tr>
        </table>
        <a class="aa" href="edit_profile.php"><b>Edit Profile</b></a>
    </div>
<?php
} else {
    echo "<div class='card'><h3>No profile details found!</h3></div>";
}
?>
</body>

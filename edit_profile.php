<?php
session_start();
$user = $_SESSION['userid']; // email stored in session
include_once("../shares/db/mydatabase.inc");
include("top.php");

// Fetch provider details
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
}
?>

<head>
<style>
    body{
        background-image:url(../common/image/bg1.jpg);
        background-repeat:no-repeat;
        background-size:cover;
        font-family:'Segoe UI',sans-serif;
    }
    .card {
        max-width: 650px;
        background-color: rgba(255, 255, 255, 0.95);
        margin: 40px auto;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        padding: 30px;
    }
    .card h2 {
        text-align: center;
        color: red;
        margin-bottom: 20px;
    }
    .form-table {
        width: 100%;
    }
    .form-table td {
        padding: 10px;
        font-size: 16px;
    }
    label {
        font-weight: bold;
        color: red;
        text-transform: uppercase;
    }
    input[type="text"], input[type="number"], input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 20px;
        background-color: red;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: darkred;
    }
</style>
</head>
<body>

<div class="card">
    <h2>Edit Profile</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="form-table">
            <tr><td><label>Company Name:</label></td>
                <td><input type="text" name="company_name" value="<?php echo $company_name; ?>"></td></tr>

            <tr><td><label>Phone:</label></td>
                <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td></tr>

            <tr><td><label>Address:</label></td>
                <td><input type="text" name="address" value="<?php echo $address; ?>"></td></tr>

            <tr><td><label>Experience:</label></td>
                <td><input type="number" name="experience" value="<?php echo $experience; ?>"></td></tr>

            <tr><td><label>Website:</label></td>
                <td><input type="text" name="website" value="<?php echo $website; ?>"></td></tr>

            <tr><td><label>License No:</label></td>
                <td><input type="text" name="license" value="<?php echo $license; ?>"></td></tr>

            <tr><td><label>Profile Image:</label></td>
                <td>
                    <img src="../uploads/<?php echo $image; ?>" width="100" height="100" style="border-radius:8px;"><br>
                    <input type="file" name="image">
                </td>
            </tr>
        </table>
        <center>
            <button type="submit" class="btn" name="update">Update</button>
            <a href="profile.php" class="btn">Cancel</a>
        </center>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $company_name = $_POST['company_name'];
    $phone        = $_POST['phone'];
    $address      = $_POST['address'];
    $experience   = $_POST['experience'];
    $website      = $_POST['website'];
    $license      = $_POST['license'];

    // Handle image upload if new file provided
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    }

    $sql = "UPDATE tbl_service_provider 
            SET company_name='$company_name',
                address='$address',
                experience='$experience',
                phone='$phone',
                website='$website',
                license_number='$license',
                image='$image'
            WHERE email='$user'";

    setDatas($sql);
    msgbox("Profile updated successfully!");
    nextPage("profile.php");
}
?>
</body>

<?php
session_start();
$user = $_SESSION['userid']; // email stored in session
include_once("../shares/db/mydatabase.inc");
include("top.php");
?>

<head>
<style>
    body{
        background-image:url(../common/image/bg1.jpg);
        background-repeat:no-repeat;
        background-size:cover;
    }
    .profile-card {
        background: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 40px auto;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        padding: 30px;
    }
    .profile-card h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #2c3e50;
    }
    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }
    .profile-table td {
        padding: 10px 0;
        vertical-align: top;
        font-size: 16px;
    }
    .profile-table label {
        font-weight: bold;
        color: red;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 15px;
    }
    input[type=text], input[type=number], input[type=file] {
        border:1px black solid;
        border-radius: 8px;
        width:400px;
        height: 40px;
        padding: 8px;
    }
    .aa {
        display: inline-block;
        margin-top: 25px;
        padding: 12px 20px;
        background-color: red;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }
    .aa:hover {
        background-color: red;
        color: white;
    }
</style>
</head>
<body>

<?php
$sql = "SELECT * FROM tbl_owner WHERE email='$user'";
$tbl = getDatas($sql);

if ($tbl != null) {
    $name    = $tbl[0][1];
    $email   = $tbl[0][2];
    $address = $tbl[0][3];
    $phone   = $tbl[0][4];
    $img     = $tbl[0][5];
}
?>

<div class="profile-card">
    <form action="" method="post" enctype="multipart/form-data">   
        <h2>Edit Profile</h2>
        <table class="profile-table">
            <tr>
                <td><label>Name:</label></td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" readonly></td>
            </tr>
            <tr>
                <td><label>Address:</label></td>
                <td><input type="text" name="address" value="<?php echo $address; ?>" required></td>
            </tr>
            <tr>
                <td><label>Phone:</label></td>
                <td><input type="number" name="phone" value="<?php echo $phone; ?>" required></td>
            </tr>
            <tr>
                <td><label>Profile Image:</label></td>
                <td>
                    <input type="file" name="image">
                    <?php if($img != "") { ?>
                        <br><img src="<?php echo $img; ?>" width="100" height="100" style="margin-top:10px;border-radius:8px;">
                    <?php } ?>
                </td>
            </tr>
        </table>
        <center>
            <input type="submit" class="aa" value="UPDATE"><br><br>
            <a class="aa" href="view_profile.php">GO TO MY PROFILE</a>
        </center>
    </form>
</div>

<?php
if (isset($_POST['name'])) {
    $a = $_POST['name'];
    $f = $_POST['address'];
    $h = $_POST['phone'];

    $imgPath = $img; // keep old if not updated
    if (!empty($_FILES["image"]["name"])) {
        $fldr = "../uploads";
        $fileName = $_FILES["image"]["name"];
        $tmpName  = $_FILES["image"]["tmp_name"];
        $imgPath  = $fldr."/".$fileName;
        move_uploaded_file($tmpName, $imgPath);
    }

    $sql = "UPDATE tbl_owner 
            SET name='$a', address='$f', phone='$h', image='$imgPath' 
            WHERE email='$user'";
    setDatas($sql);
    msgbox("Profile updated successfully!");
    nextPage("profile.php");
}
?>
</body>

<?php
session_start();
$user = $_SESSION['userid']; // logged in provider's email
include("../shares/db/mydatabase.inc");
include("top.php");

// get provider_id from email
$sql = "SELECT provider_id FROM tbl_service_provider WHERE email='$user'";
$tbl = getDatas($sql);
$provider_id = $tbl[0][0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>File a Complaint</title>
<style>
    body { background:#f2f2f2; font-family:'Segoe UI',sans-serif; }
    .form-card {
        background:#fff; max-width:500px; margin:60px auto;
        padding:30px; border-radius:12px;
        box-shadow:0 8px 25px rgba(0,0,0,0.2);
    }
    h2 { text-align:center; color:#e61212; margin-bottom:20px; }
    .form-group { margin-bottom:15px; }
    label { font-weight:bold; display:block; margin-bottom:6px; }
    textarea {
        width:100%; padding:12px; border-radius:8px;
        border:1px solid #ddd; background:#f9f9f9;
    }
    button {
        width:100%; padding:14px;
        border:none; border-radius:30px;
        background:#e61212; color:#fff; font-size:16px;
        font-weight:bold; cursor:pointer;
    }
    button:hover { background:#c10f0f; }
</style>
</head>
<body>
<div class="form-card">
    <h2>File a Complaint</h2>
    <form method="post">
        <div class="form-group">
            <label>Your Complaint</label>
            <textarea name="complaint" rows="4" required></textarea>
        </div>
        <button type="submit">Submit Complaint</button>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['complaint'])) {
    $complaint = $_POST['complaint'];

    $sql = "INSERT INTO tbl_provider_complaint (provider_id, complaint, status) 
            VALUES ('$provider_id','$complaint','Pending')";
    setDatas($sql);

    msgbox("Complaint submitted successfully!");
    nextPage("view_complaints.php");
}
?>

<?php
include("top.php");
include("../shares/db/mydatabase.inc");
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service Provider Signup</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
<style>
    * { box-sizing: border-box; }
    h2 { font-weight: bold; margin-bottom: 20px; }
    form,td,tr {
        margin-left: 400px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                    0 10px 10px rgba(0, 0, 0, 0.22);
        padding: 40px;
        width: 100%;
        max-width: 700px;
    }
    .form-group { display: flex; flex-direction: column; margin-bottom: 5px; }
    label { margin-bottom: 5px; font-weight: 600; }
    input, textarea {
        padding: 12px;
        height:35px;
        background-color: #eee;
        border: none;
        border-radius: 4px;
        font-family: inherit;
    }
    textarea { resize: vertical; height: auto; }
    .button-group { display: flex; justify-content: space-between; margin-top: 20px; }
    input[type="submit"], input[type="reset"] {
        background-color:#292f4f ;
        color:#FF934E;
        border: none;
        padding: 12px 30px;
        border-radius: 20px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    input[type="submit"]:hover, input[type="reset"]:hover { transform: scale(1.05); }
    input[type="file"] { background-color: transparent; }
    .err { color: red; font-size: 14px; }
</style>
    <script>
             function validatePhoneNumber(input) {
            const value = input.value.trim();
            const errorElement = document.getElementById('err_contact');
    
            input.value = value.replace(/\D/g, '');

            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }

            if (input.value.length !== 10) {
                errorElement.innerText = "Phone number must be exactly 10 digits";
            } else {
                errorElement.innerText = "";
            }
        }

        function validatePassword(input) {
            const password = input.value;
            const errElement = document.getElementById('err_pwd');

            if (password.length < 8) {
                errElement.innerText = "Password must be at least 8 characters.";
                return;
            }

            const hasUpper = /[A-Z]/.test(password);
            const hasLower = /[a-z]/.test(password);
            const hasDigit = /\d/.test(password);
            const hasSpecial = /[\W_]/.test(password);

            if ((hasUpper + hasLower + hasDigit + hasSpecial) < 3) {
                errElement.innerText = "Password must contain 3 of: uppercase, lowercase, number, special char.";
                return;
            }

            errElement.innerText = "";
        }

        function confirmPasswordMatch() {
            const pwd = document.getElementById("std_password").value;
            const cpwd = document.getElementById("std_cpassword").value;
            const errElement = document.getElementById('err_cpwd');

            if (pwd !== cpwd) {
                errElement.innerText = "Passwords do not match.";
            } else {
                errElement.innerText = "";
            }
        }

        function validateEmail(input) {
            const email = input.value.trim();
            const errElement = document.getElementById("err_email");
            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!pattern.test(email)) {
                errElement.innerText = "Enter a valid email address.";
            } else if (!email.endsWith(".com")) {
                errElement.innerText = "Email must end with '.com'";
            } else {
                errElement.innerText = "";
            }
        }
        var verifyText = function(e, err) {
            document.getElementById(err).innerHTML = "";
            var code;
            if (!e)
                var e = window.event;
            if (e.keyCode)
                code = e.keyCode;
            else if (e.which)
                code = e.which;
            var character = String.fromCharCode(code);
            var AllowRegex = /^[\ba-zA-Z\s-]$/;
            if (AllowRegex.test(character))
                return true;
            //alert("Only Text Values");
            document.getElementById(err).innerHTML = "Only Text Values";
            return false;
        };
function validatePincode(input) {
    const value = input.value.trim().replace(/\D/g, '');
    input.value = value.slice(0, 6);
    const err = document.getElementById("err_pincode");

    if (value.length !== 6) {
        err.innerText = "Pincode must be exactly 6 digits.";
    } else {
        err.innerText = "";
    }
}

function validateEmpId(input) {
    const value = input.value.trim().replace(/\D/g, '');
    input.value = value.slice(0, 11);
    const err = document.getElementById("err_empid");

    if (value.length !== 11) {
        err.innerText = "ID must be exactly 11 digits.";
    } else {
        err.innerText = "";
    }
}

       function validateForm() {
    const fields = ['err_contact', 'err_pwd', 'err_cpwd', 'err_email', 'err_name', 'err_pincode', 'err_empid'];
    for (let i = 0; i < fields.length; i++) {
        if (document.getElementById(fields[i]).innerText !== '') {
            alert("Please fix the errors before submitting.");
            return false;
        }
    }
    return true;
}
</script>
</head>
<body>
<br>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
    <h2>Service Provider Registration</h2>

    <div class="form-group">
        <label>Company Name</label>
        <input type="text" name="company_name"  required onkeypress="return verifyText(event,'err_name');">
         <br><span id="err_name" class="err"></span>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="provider_email" oninput="validateEmail(this);" required>
        <div id="err_email" class="err"></div>
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="provider_address" required></textarea>
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="provider_number" oninput="validatePhoneNumber(this);" required>
        <div id="err_contact" class="err"></div>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="provider_description" required></textarea>
    </div>

    <div class="form-group">
        <label>License No</label>
        <input type="text" name="provider_license" required>
    </div>

    <div class="form-group">
        <label>Website</label>
        <input type="text" name="provider_website" required>
    </div>

    <div class="form-group">
        <label>Proof Document</label>
        <input type="file" name="provider_doc" required>
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="file" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="login_password" oninput="validatePassword(this);"required>
<div id="err_pwd" class="err"></div>
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" oninput="confirmPasswordMatch();" required>
        <div id="err_cpwd" class="err"></div>
    </div>

    <div class="button-group">
        <input type="submit" value="Signup">
        <input type="reset" value="Clear">
    </div>
</form>
</body>
</html>

<?php
if (isset($_POST["company_name"])) {
    $pname        = $_POST["company_name"];
    $pemail       = $_POST["provider_email"];
    $paddress     = $_POST["provider_address"];
    $pnumber      = $_POST["provider_number"];
    $pdescription = $_POST["provider_description"];
    $plicense     = $_POST["provider_license"];
    $pwebsite     = $_POST["provider_website"];
    $ppassword    = $_POST["login_password"];
    $cpassword    = $_POST["confirm_password"];

    // check password match
    if($ppassword !== $cpassword){
        msgbox("Passwords do not match!");
        exit();
    }

    // upload folder
    $fldr = "../uploads";

    // upload provider photo
    $photo_name = $_FILES["file"]["name"];
    $photo_tmp  = $_FILES["file"]["tmp_name"];
    $photo_path = $fldr."/".$photo_name;
    move_uploaded_file($photo_tmp, $photo_path);

    // upload proof document
    $proof_name = $_FILES["provider_doc"]["name"];
    $proof_tmp  = $_FILES["provider_doc"]["tmp_name"];
    $proof_path = $fldr."/".$proof_name;
    move_uploaded_file($proof_tmp, $proof_path);

    // insert into tbl_service_provider
    $sql = "INSERT INTO `tbl_service_provider`(`company_name`, `address`, `experience`, `proof`, `phone`, `email`, `website`, `license_number`, `image`) VALUES
            ('$pname','$paddress','$pdescription','$proof_path','$pnumber','$pemail','$pwebsite','$plicense','$photo_path')";
    setDatas($sql);

    // insert into tbl_login
     $sql = "INSERT INTO `tbl_login`(`username`, `password`, `usertype`, `status`) VALUES ('$pemail','$ppassword','provider','0')";
    setDatas($sql);

    msgbox("Successfully registered! Awaiting admin approval.");
    nextPage("login.php");
}
?>

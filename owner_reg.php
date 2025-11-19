<?php  
include("top.php");
include_once("../shares/db/mydatabase.inc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Owner Signup</title>
  <style>
    * { box-sizing: border-box; }
    h2 { font-weight: bold; margin-bottom: 20px; }
    form {
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                  0 10px 10px rgba(0, 0, 0, 0.22);
      padding: 40px;
      width: 100%;
      max-width: 700px;
    }
    .form-group { display: flex; flex-direction: column; margin-bottom: 15px; }
    label { margin-bottom: 5px; font-weight: 600; }
    input, textarea {
      padding: 12px;
      background-color: #eee;
      border: none;
      border-radius: 4px;
      font-family: inherit;
    }
    textarea { resize: vertical; }
    .button-group { display: flex; justify-content: space-between; margin-top: 20px; }
    input[type="submit"], input[type="reset"] {
      background-color: #e61212;
      color: #fff;
      border: none;
      padding: 12px 30px;
      border-radius: 20px;
      font-weight: bold;
      text-transform: uppercase;
      cursor: pointer;
      transition: transform 0.2s ease-in-out;
    }
    input[type="submit"]:hover, input[type="reset"]:hover { transform: scale(1.05); }
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
  <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
    <h2>Owner Registration</h2>

    <div class="form-group">
      <label for="owner_name">Name</label>
      <input type="text" id="owner_name" name="owner_name"  required onkeypress="return verifyText(event,'err_name');">
    <br><span id="err_name" class="err"></span>
      </div>
    <div class="form-group">
      <label for="owner_email">Email</label>
      <input type="email" id="owner_email" name="owner_email" oninput="validateEmail(this);" required>
        <br><span id="err_name" class="err"></span>
    </div>

    <div class="form-group">
      <label for="owner_address">Address</label>
      <textarea id="owner_address" name="owner_address" required></textarea>
    </div>

    <div class="form-group">
      <label for="owner_number">Phone Number</label>
      <input type="text" id="owner_number" name="owner_number" oninput="validatePhoneNumber(this);" required>
        <div id="err_contact" class="err"></div>
    </div>

    <div class="form-group">
      <label for="file">Profile Image</label>
      <input type="file" id="file" name="file" required />
    </div>

    <div class="form-group">
      <label for="login_password">Password</label>
      <input type="password" id="login_password" name="login_password" oninput="validatePassword(this);" required>
         <div id="err_pwd" class="err"></div>
    </div>

    <div class="form-group">
      <label for="confirm_password">Confirm Password</label>
      <input type="password" id="confirm_password" name="confirm_password" oninput="confirmPasswordMatch();" required>
                                    <div id="err_cpwd" class="err"></div>
    </div>

    <div class="button-group">
      <input type="submit" value="Signup" />
      <input type="reset" value="Clear" />
    </div>
  </form>
</body>
</html>

<?php
if (isset($_POST["owner_name"])) {
    $name     = $_POST["owner_name"];
    $email    = $_POST["owner_email"];
    $address  = $_POST["owner_address"];
    $number   = $_POST["owner_number"];
    $password = $_POST["login_password"];
    $cpassword= $_POST["confirm_password"];

    // password match check
    if ($password !== $cpassword) {
        msgbox("Passwords do not match!");
        exit();
    }

    // check for duplicate email or phone
    $check = "SELECT * FROM tbl_owner WHERE email='$email' OR phone='$number'";
    $exists = getDatas($check);

    if ($exists != null && count($exists) > 0) {
        msgbox("Email or Phone already registered!");
        exit();
    }

    // file upload
    $fldr = "../uploads";
    if (!is_dir($fldr)) {
        mkdir($fldr, 0777, true);
    }

    $photo_name = $_FILES["file"]["name"];
    $photo_tmp  = $_FILES["file"]["tmp_name"];
    $photo_path = $fldr . "/" . basename($photo_name);

    if (!move_uploaded_file($photo_tmp, $photo_path)) {
        msgbox("Image upload failed!");
        exit();
    }

    // Insert into tbl_owner
    $sql1 = "INSERT INTO tbl_owner (name, email, address, phone, image)
             VALUES ('$name','$email','$address','$number','$photo_path')";
    $res1 = setDatas($sql1);

    // Insert into tbl_login
    $sql2 = "INSERT INTO tbl_login (username, password, usertype, status)
             VALUES ('$email', '$password', 'owner', '1')";
    $res2 = setDatas($sql2);

    if ($res1 && $res2) {
        msgbox("Successfully registered!");
        nextPage("login.php");
    } else {
        msgbox("Something went wrong during registration!");
    }
}
?>

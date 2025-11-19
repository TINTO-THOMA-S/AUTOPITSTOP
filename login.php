<?php
session_start();
include("../shares/db/mydatabase.inc");
include("top.php")
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&family=Bebas+Neue&display=swap" rel="stylesheet">

<style>
body {
  min-height: 100vh;
  margin: 0;
  padding: 0;
  font-family: 'Poppins', 'Segoe UI', sans-serif;
  background: #2c2e47;
  position: relative;
  overflow: hidden;
}
.car-bg {
  position: fixed;
  top: 0; left: 0; width: 100vw; height: 100vh;
  z-index: 0;
  opacity: 0.18;
  background: url('login_img') center center no-repeat #2c2e47;
  background-size: cover;
}

/* Center everything */
.page-center {
  position: fixed;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  top: 0; left: 0; width: 100vw; height: 100vh;
  z-index: 1;
}

.autopit-title {
  font-family: "Bebas Neue", "Montserrat", Arial, sans-serif;
  color: #ff914d;
  font-weight: 900;
  font-size: 3rem;
  letter-spacing: 7px;
  margin-bottom: 0.7rem;
  margin-top: 1.5rem;
  text-shadow: 0 2px 26px #8d4af760;
}

.welcome-msg {
  margin-bottom: 1.5rem;
  color: #fff;
  font-weight: 500;
  font-size: 1.3rem;
  letter-spacing: 1px;
  font-family: 'Poppins', 'Segoe UI', sans-serif;
  text-shadow: 0 2px 12px #8d4af780;
}

.login-wrapper {
  background: #fff;
  padding: 2.8rem 2.3rem 2rem 2.3rem;
  border-radius: 36px 100px 36px 100px;
  box-shadow: 0 12px 60px rgba(141, 74, 247, 0.28), 0 1.5px 24px #ff914d;
  max-width: 370px;
  min-width: 340px;
  animation: fadeIn 1s ease;
  position: relative;
  display: flex;
  flex-direction: column;
}

.login-wrapper h2 {
  text-align: center;
  margin-bottom: 2rem;
  color: #8d4af7;
  letter-spacing: 2px;
  font-weight: 700;
  font-family: 'Montserrat', Arial, sans-serif;
  font-size: 2.05rem;
  text-shadow: 0 2px 12px #ff914d40;
}

.form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  margin-bottom: 0.4rem;
  color: #222;
  font-weight: 500;
  letter-spacing: 0.5px;
  font-family: inherit;
  font-size: 1rem;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 0.85rem 0.8rem;
  border: 2px solid #e4e2fc;
  border-radius: 10px;
  font-size: 1rem;
  background-color: #f7f7fa;
  transition: border 0.3s;
  margin-bottom: 2px;
  font-family: 'Poppins', sans-serif;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-color: #ff914d;
  outline: none;
}

button[type=submit] {
  width: 100%;
  padding: 1rem 0;
  background-image: linear-gradient(to right, #8d4af7, #ff914d);
  border: none;
  color: #fff;
  font-size: 1.14rem;
  border-radius: 40px;
  cursor: pointer;
  font-weight: 700;
  letter-spacing: 1.1px;
  transition: background 0.3s, box-shadow 0.23s;
  box-shadow: 0 1.5px 18px #ff914d60;
  margin-top: 0.8rem;
}

button[type=submit]:hover {
  background-image: linear-gradient(to right, #ff914d, #8d4af7);
  box-shadow: 0 6px 34px #8d4af770;
}

.signup-row {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1.1rem;
  font-size: 1rem;
}

.signup-row span {
  color: #8d4af7;
  font-weight: 500;
  font-family: inherit;
}

.signup-row a {
  display: inline-block;
  padding: 0.55rem 1.13rem;
  background: #ff914d;
  color: #fff;
  border-radius: 19px;
  font-weight: 800;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
  letter-spacing: 0.7px;
  margin-left: 4px;
  transition: background 0.2s, box-shadow 0.2s;
  box-shadow: 0 1.5px 14px #8d4af760;
}
.signup-row a:hover {
  background: #8d4af7;
  color: #fff;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px);}
  to   { opacity: 1; transform: translateY(0);}
}

@media (max-width:600px){
  .login-wrapper {
    padding: 1.1rem 0.5rem;
    border-radius: 24px;
    min-width: 90vw;
  }
  .autopit-title { font-size: 2rem; }
}
</style>

<body>
  <div class="car-bg"></div>
  <div class="page-center">
    <!-- Logo/Header -->
    <div class="autopit-title"></div>
    <div class="welcome-msg">Log in to continue your journey</div>
    
    <div class="login-wrapper">
      <h2>Login</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="username">Email / Username</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <button type="submit">Login</button>
        <div class="signup-row">
          <span>Don't have an account?</span>
          <a href="owner_reg.php">Create One</a>
        </div>
      </form>
    </div>
  </div>
</body>




<?php
if (isset($_POST['username'])) {
    $a = $_POST['username'];
    $b = $_POST['password'];
    $sql = "SELECT usertype, status FROM tbl_login WHERE username='$a' AND password='$b'";
    $tbl = getDatas($sql);

    if ($tbl && count($tbl) > 0) {
        $usertype = $tbl[0][0];
        $status   = $tbl[0][1];

        if ($status == 1) {
            $_SESSION['userid'] = $a;
            if ($usertype == 'admin') {
                nextPage('../admin/index.php');
            } elseif ($usertype == 'owner') {
                nextPage('../owner/index.php');
            } elseif ($usertype == 'provider') {
                nextPage('../provider/index.php');
            } else {
                msgbox("Invalid user type!");
            }
        } else {
            msgbox("Sorry! Your account is not yet approved.");
            nextPage("login.php");
        }
    } else {
        msgbox("Invalid login credentials!");
        nextPage("login.php");
    }
}
?>

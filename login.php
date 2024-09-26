<?php session_start(); ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

  <link rel="stylesheet" href="adminTci/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="adminTci/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="adminTci/assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" style="min-height: 466px;">
  <div class="login-box">

    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><img src="images/logotci.png" alt="Logo"></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">โปรดลงชื่อเข้าใช้ตามสถานะ</p>
        <form onsubmit="return login()" action="login_db.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  จดจำฉัน
                </label>
              </div>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">ล็อกอิน</button>
            </div>

          </div>
        </form>

        <p class="mb-1">
          <a href="#">ฉันลืมรหัสผ่าน</a>
        </p>
      </div>

    </div>

  </div>


  <script src="adminTci/assets/plugins/jquery/jquery.min.js"></script>

  <script src="adminTci/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="adminTci/assets/dist/js/adminlte.min.js?v=3.2.0"></script>


</body>

</html>


<!--Codeตัวเก่าที่เชื่อมกับ Css
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/login.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <title>login</title>

</head>

<body>
  <nav>
    <div class="logo">
      <img src="images/logotci.png" alt="Logo">
    </div>
  </nav>
  <div class=" box">
    <div class="container">
      <div class="top-header">
        <header>เข้าสู่ระบบ</header>
      </div>
      <form onsubmit="return login()" action="login_db.php" method="POST">
        <div class="input-field">
          <input type="text" class="input" id="username" placeholder="ชื่อผู้ใช้" name="username" required>
          <i><ion-icon class="bx bx-user" name="people-outline"></ion-icon></i>
        </div>
        <div class="input-field">
          <input type="password" class="input" id="password" placeholder="รหัสผ่าน" name="password" required>
          <i><ion-icon class="bx bx-lock-alt" name="lock-closed-outline"></ion-icon></i>
        </div>
        <div class="input-field">
          <input type="submit" class="submit" value="ล็อกอิน">
        </div>
        <div class="bottom">

          <div class="right">
            <label><a href="#">ลืมรหัสผ่าน</a></label>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html> -->
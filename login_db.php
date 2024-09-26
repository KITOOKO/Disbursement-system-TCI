<?php 
session_start();
if (isset($_POST['username'])) {
    //connection
    include("condblogin.php");
    //รับค่า user & password
    $username = $_POST['username'];
    $password = $_POST['password'];
    //query 
    $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";
    // echo $sql;
    // exit;
    $result = mysqli_query($condb,$sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["level"] = $row["level"];

        if ($_SESSION["level"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
            // echo 'R U admin';
            Header("Location: adminTci/");

        } else if ($_SESSION["level"] == "member") {  
            // echo 'R U member';
            Header("Location: chief_mechanic/"); 

        } else if ($_SESSION["level"] == "employee") {  
            // echo 'R U member';
            Header("Location: chief_mechanic/"); 

        } else if ($_SESSION["level"] == "sales") {  
            // echo 'R U sales';
            Header("Location: sales_department/"); 
        
        }else {
            echo "<script>";
            echo "alert(\" username หรือ  password ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {
    Header("Location: login.php"); //user & password incorrect back to login again
} 
?>
<!-- // // เชื่อมต่อกับฐานข้อมูล
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "php_multiplelog";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // ตรวจสอบการเชื่อมต่อ
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// // ตรวจสอบการส่งค่าจากฟอร์ม
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     // ตรวจสอบข้อมูลในฐานข้อมูล
//     $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         // เข้าสู่ระบบสำเร็จ
//         session_start();
//         $_SESSION['username'] = $username;
//         echo 'R U member';
//         // header("Location: index.php");
//         exit();
//     } else {
//         // ไม่สามารถเข้าสู่ระบบได้
//         echo '<script>alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");';
//         echo 'window.location.href = "login.php";</script>';  -->
<!-- //     }
//  } -->
<!-- // // $conn->close(); -->

<?php
// เริ่ม session
session_start();
// ทำลาย session
session_destroy();
// ลิ้งค์ไปยังหน้า login หลังจาก logout
header("Location: login.php");
exit();
?>
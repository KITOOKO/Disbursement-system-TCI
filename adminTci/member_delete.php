<?php
if (isset($_GET['id']) && $_GET['act'] == 'delete') {
    $id = $_GET['id'];
    //echo $id;
    $stmtDelMember = $condb->prepare('DELETE FROM tbl_member WHERE id=:id');
    $stmtDelMember->bindParam(':id', $id, PDO::PARAM_INT); //ตัวเลขใช้PARM_INT เป็นข้อความใช้STRหรือString
    $stmtDelMember->execute();
    $condb = null; //close connect db
    // echo 'จำนวน row ที่ลบได้' .$stmtDelMember->rowCount();
    if ($stmtDelMember->rowCount() == 1) {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
        exit();
    } else {
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
        exit();
    }
}
?>

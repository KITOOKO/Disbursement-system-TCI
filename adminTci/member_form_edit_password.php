<?php
if (isset($_GET['id']) && $_GET['act'] == 'editPwd') {

    //Single row query แสดงแค่ 1 รายการ (FETCH_ASSOC)
    $stmtMemderDetail = $condb->prepare("SELECT* FROM tbl_member WHERE id=?");
    $stmtMemderDetail->execute([$_GET['id']]);
    $row = $stmtMemderDetail->fetch(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($row);
    // exit;

    //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า หยุดการทำงานห
    if ($stmtMemderDetail->rowCount() != 1) {
        exit();
    }
} //isset
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ฟอร์มแก้ไขรหัสผ่าน</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2">Email/Username</label>
                                        <div class="col-sm-4">
                                            <input type="email" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ชื่อ-สกุล</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="name" class="form-control" required placeholder="ชื่อ" value="<?php echo $row['title_name'] . $row['name'] . ' ' . $row['surname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">รหัสผ่านใหม่</label>
                                        <div class="col-sm-4">
                                            <input type="password" name="NewPassword" class="form-control" required placeholder="รหัสผ่านใหม่">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ยืนยันรหัสผ่าน</label>
                                        <div class="col-sm-4">
                                            <input type="password" name="ConfirmPassword" class="form-control" required placeholder="ยืนยันรหัสผ่าน">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-4">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-primary">แก้ไขรหัสผ่าน</button>
                                            <a href="member.php" class="btn btn-danger">ยกเลิก</a>
                                        </div>
                                    </div>
                                </div> <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->

        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
// echo '<pre>';
// print_r($_POST);
// exit;

if (isset($_POST['id']) && isset($_POST['NewPassword']) && isset($_POST['ConfirmPassword'])) {
    // echo 'เข้าเงื่อนไข';
    // exit;

    //ประกาศตัวแปรรับค่าจากForm
    $id = $_POST['id'];
    $NewPassword = $_POST['NewPassword'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    if ($NewPassword != $ConfirmPassword) {
        echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "รหัสผ่านไม่ตรงกัน !!",
                      text: "กรุณากรอกรหัสผ่านใหม่อีกครั้ง !",
                      type: "error"
                  }, function() {
                      window.location = "member.php?id=' . $id . '&act=editPwd"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';
    } else {
        $password = sha1($_POST['NewPassword']);
        //sql update
        $stmtUpdate = $condb->prepare("UPDATE  tbl_member SET password='$password' WHERE id=:id");
        //bindParam
        $stmtUpdate->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmtUpdate->execute();

        $condb = null; //close connect db
        if ($result) {
            echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "แก้ไขรหัสผ่านสำเร็จ",
                      type: "success"
                  }, function() {
                      window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป 
                  });
                }, 1000);
            </script>';
        } else { //member.php?id='.$id.'&act=editสำหรับเวลาแก้ไขแล้วให้กลับไปหน้าเดิมที่ทำการแก้ไข ใส่ในช่องWindow.location
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
        } //sweetalert
    } //check password
} //isset
?>
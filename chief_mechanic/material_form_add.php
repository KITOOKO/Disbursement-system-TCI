<?php
$queryType = $condb->prepare("SELECT * FROM tbl_type");
$queryType->execute();
$rsType = $queryType->fetchAll();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ฟอร์มเพิ่มข้อมูลวัสดุ</h1>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2">ประเภทวัสดุ</label>
                                        <div class="col-sm-2">
                                            <select name="ref_type_id" class="form-control" required>
                                                <option value="">-- เลือกข้อมูล --</option>
                                                <?php foreach ($rsType as $row) { ?>
                                                    <option value="<?php echo $row['type_id']; ?>">-- <?php echo $row['type_name']; ?> --</option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2">ชื่อวัสดุ</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="material_name" class="form-control" required placeholder="ชื่อวัสดุ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">รายละเอียดวัสดุ</label>
                                        <div class="col-sm-7">
                                            <textarea name="material_detail" id="summernote"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2">จำนวนวัสดุ</label>
                                        <div class="col-sm-3">
                                            <input type="number" name="material_qty" class="form-control" value="0" min="0" max="999">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ภาพวัสดุ</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="material_image" class="custom-file-input" require id="exampleInputFile" accept="image/*" onchange="updateFileName(this)">
                                                    <label class="custom-file-label" for="exampleInputFile">เลือกไฟล์</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">อัพโหลด</span>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function updateFileName(input) {
                                                var fileName = input.files[0].name;
                                                var label = input.nextElementSibling;
                                                label.innerHTML = fileName;
                                            }
                                        </script>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                            <a href="material.php" class="btn btn-danger">ยกเลิก</a>
                                        </div>
                                    </div>
                                </div> <!-- /.card-body -->
                            </form>
                            <?php
                            // echo '<pre>';
                            // print_r($_POST);
                            // echo '<hr>';
                            // print_r($_FILES);
                            // exit;
                            ?>
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
// ตรวจสอบ input จาก from
// echo '<pre>';
// print_r($_POST);
//exit;
if (isset($_POST['material_name']) && isset($_POST['ref_type_id'])) {

    // echo 'ถูกเงื่อนไขส่งข้อมูลได้'
    // ประกาศตัวแปรรับค่าจากฟอร์ม
    $ref_type_id = $_POST['ref_type_id'];
    $material_name = $_POST['material_name'];
    $material_detail = $_POST['material_detail'];
    $material_qty = $_POST['material_qty'];

    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $material_image = (isset($_POST['material_image']) ? $_POST['material_image'] : '');
    $upload = $_FILES['material_image']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['material_image']['name'], ".");

        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if ($typefile == '.jpg' || $typefile  == '.jpeg' || $typefile  == '.png') {

            //โฟลเดอร์ที่เก็บไฟล์
            $path = "./assets/dist/material_img/M";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['material_image']['tmp_name'], $path_copy);

            // sql insert
            $stmtInserMaterial = $condb->prepare("INSERT INTO tbl_material (ref_type_id, material_name, material_detail, material_qty, material_image)
            VALUES (:ref_type_id, :material_name, :material_detail, :material_qty, '$newname')");

            // bindParam
            $stmtInserMaterial->bindParam(':ref_type_id', $ref_type_id, PDO::PARAM_INT);
            $stmtInserMaterial->bindParam(':material_name', $material_name, PDO::PARAM_STR);
            $stmtInserMaterial->bindParam(':material_detail', $material_detail, PDO::PARAM_STR);
            $stmtInserMaterial->bindParam(':material_qty', $material_qty, PDO::PARAM_INT);
            $result = $stmtInserMaterial->execute();

            $condb = null; //close connect db

            // เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if ($result) {
                echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "material.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
            } else {
                echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "material.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
            } //else ของ if result


        } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                      type: "error"
                  }, function() {
                      window.location = "material.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {
} //isset
?>
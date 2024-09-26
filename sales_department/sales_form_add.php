<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ฟอร์มเพิ่มข้อมูลลูกค้า</h1>
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
                                        <label class="col-sm-2">ชื่อ-นามสกุล</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="name_surname" class="form-control" required placeholder="ชื่อ-นามสกุล">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">เลขบัตรประชาชน</label>
                                        <div class="col-sm-5">
                                            <input type="text" id="id_card_Number" name="id_card_Number" class="form-control" maxlength="13" required placeholder="เลข 13 หลัก" oninput="validateIDCardNumber(this)">
                                            <span id="id_card_validation"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">เบอร์โทร</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="phone" class="form-control" maxlength="10" required placeholder="เบอร์โทร10 หลัก" oninput="validatePhoneNumber(this)">
                                            <span id="phone_validation"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ที่อยู่</label>
                                        <div class="col-sm-7">
                                            <textarea name="address" id="summernote"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ยี้ห้อรถ</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="car_brand" class="form-control" required placeholder="ยี้ห้อรถ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">ทะเบียนรถ</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="car_registration" class="form-control" required placeholder="ทะเบียนรถ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">รายละเอียดสั่งทำ</label>
                                        <div class="col-sm-7">
                                            <textarea name="order_details" id="summernote"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">วันที่รับงาน</label>
                                        <div class="col-sm-1">
                                            <input type="date" name="date_received" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">วันที่ส่งงาน</label>
                                        <div class="col-sm-1">
                                            <input type="date" name="date_sent" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                                            <a href="sales.php" class="btn btn-danger">ยกเลิก</a>
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

<!-- .script บังคับเลขบัตรประชาชนและเบอร์ -->
<script>
    // รูปแบบของเลขบัตรประชาชน
    function validateIDCardNumber(input) {
        var regex = /^[0-9]*$/; // รูปแบบของเลขที่ยอมรับคือเฉพาะตัวเลขเท่านั้น
        if (!regex.test(input.value)) {
            document.getElementById('id_card_validation').innerText = "กรุณากรอกเฉพาะตัวเลขเท่านั้น";
            input.value = input.value.replace(/[^0-9]/g, ''); // ลบตัวอักษรออกจากข้อมูลที่ป้อน
        } else if (input.value.length === 13) {
            input.blur(); // หยุดการใส่ข้อมูลหลังจากป้อนครบ 13 ตัวอักษร
        } else {
            document.getElementById('id_card_validation').innerText = ''; // ลบข้อความที่แสดงเมื่อป้อนถูกต้อง
        }
    }

    // รูปแบบของเบอร์
    function validatePhoneNumber(input) {
        var regex = /^[0-9]*$/; // รูปแบบของเลขที่ยอมรับคือเฉพาะตัวเลขเท่านั้น
        if (!regex.test(input.value)) {
            document.getElementById('phone_validation').innerText = "กรุณากรอกเฉพาะตัวเลขเท่านั้น";
            input.value = input.value.replace(/[^0-9]/g, ''); // ลบตัวอักษรออกจากข้อมูลที่ป้อน
        } else if (input.value.length === 10) {
            input.blur(); // หยุดการใส่ข้อมูลหลังจากป้อนครบ 10 ตัวอักษร
        } else {
            document.getElementById('phone_validation').innerText = ''; // ลบข้อความที่แสดงเมื่อป้อนถูกต้อง
        }
    }
</script>
<!-- /.script -->

<!-- /.content-wrapper -->
<?php
// ตรวจสอบ input จาก from
// echo '<pre>';
// print_r($_POST);


// exit;



if (isset($_POST['name_surname']) && isset($_POST['id_card_Number'])) {

    // echo 'ถูกเงื่อนไขส่งข้อมูลได้'
    // ประกาศตัวแปรรับค่าจากฟอร์ม
    $name_surname = $_POST['name_surname'];
    $id_card_Number = $_POST['id_card_Number'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $car_brand = $_POST['car_brand'];
    $car_registration = $_POST['car_registration'];
    $order_details = $_POST['order_details'];
    $date_received = $_POST['date_received'];
    $date_sent = $_POST['date_sent'];


    //เช็คUSซ้ำ
    $stmtSalesDetail = $condb->prepare("SELECT id_card_Number FROM tbl_sales WHERE id_card_Number=:id_card_Number");
    // bindParam
    $stmtSalesDetail->bindParam(':id_card_Number', $id_card_Number, PDO::PARAM_STR);
    $stmtSalesDetail->execute();
    $row = $stmtSalesDetail->fetch(PDO::FETCH_ASSOC);
    //นับจำนวนการคิวรี่ ถ้า1คือUsernameซ้ำ
    // echo $stmtSalesDetail->rowCount();
    // echo 'h1';
    if ($stmtSalesDetail->rowCount() == 1) {
        echo '<script>
                    setTimeout(function() {
                    swal({
                    title: "Username ซ้ำ !!",
                    text: "กรุณาเพิ่มข้อมูลใหม่อีกครั้ง",
                    type: "error"
                    }, function() {
                    window.location = "sales.php?act=add"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                    </script>';
    } else {
        
        // sql insert
        $stmtInserSales = $condb->prepare("INSERT INTO tbl_sales (name_surname, id_card_Number, phone, address, car_brand, car_registration, order_details, date_received ,date_sent)
            VALUES (:name_surname, :id_card_Number, :phone, :address, :car_brand, :car_registration, :order_details, :date_received, :date_sent)");

        // bindParam
        $stmtInserSales->bindParam(':name_surname', $name_surname);
        $stmtInserSales->bindParam(':id_card_Number', $id_card_Number);
        $stmtInserSales->bindParam(':phone', $phone);
        $stmtInserSales->bindParam(':address', $address);
        $stmtInserSales->bindParam(':car_brand', $car_brand);
        $stmtInserSales->bindParam(':car_registration', $car_registration);
        $stmtInserSales->bindParam(':order_details', $order_details);
        $stmtInserSales->bindParam(':date_received', $date_received);
        $stmtInserSales->bindParam(':date_sent', $date_sent);
        $result = $stmtInserSales->execute();

        $condb = null; //close connect db

        if ($result) {
            echo '<script>
                    setTimeout(function() {
                    swal({
                    title: "เพิ่มข้อมูลสำเร็จ",
                    type: "success"
                    }, function() {
                    window.location = "sales.php"; //หน้าที่ต้องการให้กระโดดไป
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
                    window.location = "sales.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                    </script>';
            exit();
        } //else if result
    } //เช็คข้อมูลซ้ำ
} //isset
?>
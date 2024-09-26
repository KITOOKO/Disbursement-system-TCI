<?php
//คิวรี่ข้อมูลสมาชิค
$querysales = $condb->prepare("SELECT * FROM tbl_sales");
$querysales->execute();
$rssales = $querysales->fetchAll();

//echo '<pre>';
//$querysales->debugDumpParams();
//exit;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>จัดการข้อมูลลูกค้า
                        <a href="sales.php?act=add" class="btn btn-primary">เพิ่มข้อมูล</a>
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th width="5%" class="text-center">ลำดับ.</th>
                                        <th width="10%">ชื่อ-นามสกุล</th>
                                        <th width="10%">เลขบัตรประชาชน</th>
                                        <th width="10%">เบอร์โทร</th>
                                        <th width="20%">ที่อยู่</th>
                                        <th width="5%">ยี่ห้อรถ</th>
                                        <th width="5%">ทะเบียนรถ</th>
                                        <th width="15%">รายละเอียด</th>
                                        <th width="10%">ว/ด/ป(รับ)</th>
                                        <th width="10%">ว/ด/ป(ส่ง)</th>
                                        <th width="5%" class="text-center">แก้ไข</th>
                                        <th width="5%" class="text-center">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1; //Start numer
                                    foreach ($rssales as $row) { ?>
                                        <tr>
                                            <td align="center"><?php echo $i++ ?></td>
                                            <td><?= $row['name_surname']; ?></td>
                                            <td><?= $row['id_card_Number']; ?></td>
                                            <td><?= $row['phone']; ?></td>
                                            <td><?= $row['address']; ?></td>
                                            <td><?= $row['car_brand']; ?></td>
                                            <td><?= $row['car_registration']; ?></td>
                                            <td><?= $row['order_details']; ?></td>
                                            <td><?= $row['date_received']; ?></td>
                                            <td><?= $row['date_sent']; ?></td>
                                            <td align="center"><a href="#" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                            <td align="center"><a href="sales.php?id=<?=$row['id'];?>&act=delete" onclick="return confirm('ยืนยันการลบ');" class="btn btn-danger btn-sm">ลบ</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
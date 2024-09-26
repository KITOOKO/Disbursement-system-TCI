  <?php
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once '../config/condb.php';
    $level = $_SESSION["level"];
    //คิวรี่ข้อมูลสมาชิค
    $querymaterial = $condb->prepare("SELECT  m.id, m.material_name, m.material_qty, m.material_image, t.type_name
    FROM tbl_material as m
    INNER JOIN tbl_type as t ON m.ref_type_id = t.type_id
    GROUP BY m.id");
    $querymaterial->execute();
    $rsmaterial = $querymaterial->fetchAll();

    //echo '<pre>';
    //$querymaterial->debugDumpParams();
    //exit;

    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>
                          <?php if ($level == 'admin' || $level == 'member') { ?>
                              จัดการข้อมูลวัสดุ
                              <a href="material.php?act=add" class="btn btn-primary">เพิ่มข้อมูล</a>
                          <?php } else { ?>
                              เลือกรายการเบิกวัสดุ
                          <?php } ?>
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
                                          <th width="5%">รูปภาพ</th>
                                          <th width="10%">ประเภท</th>
                                          <th width="60%">ชื่อวัสดุ</th>
                                          <th width="10%" class="text-center">จำนวน</th>
                                          <th width="5%" class="text-center">แก้ไข</th>
                                          <th width="5%" class="text-center">ลบ</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $i = 1; //Start numer
                                        foreach ($rsmaterial as $row) { ?>
                                          <tr>
                                              <td align="center"><?php echo $i++ ?></td>
                                              <td>
                                                <a href="material.php?act=withdraw">เลือก</a>
                                                  <a href="material.php?id=<?= $row['id']; ?>">
                                                      <img class="zoomable-image" src="./assets/dist/material_img/M<?= $row['material_image']; ?>" width="150px"></a>
                                              </td>
                                              <td><?= $row['type_name']; ?></td>
                                              <td><?= $row['material_name']; ?></td>
                                              <td align="right"><?= $row['material_qty']; ?></td>

                                              <?php if ($level == 'admin' || $level == 'member') { ?>
                                                  <td align="center"><a href="material.php?id=<?= $row['id']; ?>&act=edit" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                                  <td align="center"><a href="material.php?id=<?= $row['id']; ?>&act=delete" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล??');">ลบ</a></td>
                                              <?php } else if ($level == 'employee') { ?>
                                                  <td align="center" style="background-color: #eee;"><a href="#" class="btn btn-warning btn-sm" style="pointer-events: none;">แก้ไข</a></td>
                                                  <td align="center" style="background-color: #eee;"><a href="#" class="btn btn-danger btn-sm" style="pointer-events: none;">ลบ</a></td>
                                              <?php } ?>
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
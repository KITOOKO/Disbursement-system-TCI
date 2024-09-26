<?php
include 'header.php';
include 'navbar.php';
include 'sidebar_menu.php';

$act = (isset($_GET['act']) ? $_GET['act'] : '');
//สร้างเงือนไขในการเรียกใช้ไฟล์
if ($act == 'add') {
    include 'material_form_add.php';
} else if ($act == 'delete') {
    include 'material_delete.php';
} else if ($act == 'edit') {
    include 'material_form_edit.php';
} else if ($act == 'withdraw') {
    include 'material_form_withdraw.php';
} else {
    include 'material_list.php';
}
include 'footer.php'
?>
<?php
include 'header.php';
include 'navbar.php';
include 'sidebar_menu.php';
$act = (isset($_GET['act']) ? $_GET['act'] : '');
//สร้างเงือนไขในการเรียกใช้ไฟล์
if ($act == 'add') {
    include 'sales_form_add.php';
} else if ($act == 'delete') {
    include 'sales_delete.php';
} else if ($act == 'edit') {
    include 'sales_form_edit.php';
} else if ($act == 'storage') {
    include 'sales_form_cold_storage.php';
} else if ($act == 'bid') {
    include 'sales_bid.php';
} else if ($act == 'order') {
    include 'sales_production_order.php';
}else {
    include 'sales_list.php';
}

include 'footer.php'
?>
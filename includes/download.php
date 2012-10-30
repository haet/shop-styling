<?php
require_once("../../../../wp-admin/admin.php");

header('Content-disposition: attachment; filename='.$_GET['filename']);
header('Content-type: application/pdf');
readfile('../invoices/'.$_GET['filename']);
?> 
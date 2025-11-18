<?php
$page = $_GET['page'] ?? 'list';

if ($page == 'list')      include "pages/list.php";
if ($page == 'create')    include "pages/create.php";
if ($page == 'edit')      include "pages/edit.php";
if ($page == 'delete')    include "pages/delete.php";
?>

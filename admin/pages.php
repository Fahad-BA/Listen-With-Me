<?php
$rpp = 10;
$sql = "SELECT * FROM songs ORDER BY ID DESC";
$results = mysqli_query($mysqli,$sql);
$nor = mysqli_num_rows($results);
$nop = ceil($nor/$rpp);

###########################################################

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

###########################################################

$this_page_first_result = ($page-1)*$rpp;
?>
<!--
Developed by : Fhidan ~ Fhidan@outlook.com ~ Fhidan.com ..
 -->
 <?php
 include 'style.php';
 include '../config.php';
 $YON = '<img src="../img/y-on.png">';
 $YOF = '<img src="../img/y-of.png">';
 $SON = '<img src="../img/s-on.png">';
 $SOF = '<img src="../img/s-of.png">';

###########################################################

$rpp = 10;
$sql = "SELECT * FROM visitors ORDER BY ID DESC";
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

###########################################################

$sql='SELECT * FROM visitors ORDER BY ID DESC LIMIT ' . $this_page_first_result . ',' .  $rpp;
$result = mysqli_query($mysqli, $sql);
echo '<table dir="rtl">';
while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
                if ($row['YouTube'] == !NULL) { echo '<td><a target="_blank" href=' . $row['YouTube'] . '>' . $YON . ' </a></td>'; }
                if ($row['Soundcloud'] == !NULL) { echo '<td><a target="_blank" href=' . $row['Soundcloud'] . '>' . $SON . ' </a></td>'; }
                echo "<td>" . '<p class="songname">' . $row['Name'] . "</p></td>";

}
echo "</table><br><br>";
###########################################################
	echo "« ";
for ($page=1;$page <= $nop; $page++) {
  echo '<a class="email-address" href="visitors.php?page=' . $page . '">' . $page . '</a>';
  if ($nop > $page) {
  	echo '<text class="email-address"> , </text>';
  }
}
	echo " »";
$mysqli->close();
include '../footer.php';
?>
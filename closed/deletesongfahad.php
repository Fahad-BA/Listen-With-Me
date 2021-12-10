<?php

 include 'style.php';
 include '../config.php';
 $YON = '<img src="../img/y-on.png">';
 $YOF = '<img src="../img/y-of.png">';
 $SON = '<img src="../img/s-on.png">';
 $SOF = '<img src="../img/s-of.png">';

###########################################################

$rpp = 15;
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


?>

<body>
<form name="form1" action="" method="post">
<?php
$del='SELECT * FROM visitors ORDER BY ID DESC LIMIT ' . $this_page_first_result . ',' .  $rpp;
$res = mysqli_query($mysqli, $del);
echo "<table>";
while($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>"; ?> <input type="checkbox" name="num[]" class="other" value="<?php echo $row["ID"]; ?>" /> <?php echo "</td>";
                echo "<td>" . '<p class="songname">' . $row['ID'] . "</p></td>";
                echo "<td>" . '<p class="songname">' . $row['Name'] . "</p></td>";
                if ($row['YouTube'] == !NULL) { echo '<td><a target="_blank" href=' . $row['YouTube'] . '>' . $YON . ' </a></td>'; }
                if ($row['Soundcloud'] == !NULL) { echo '<td><a target="_blank" href=' . $row['Soundcloud'] . '>' . $SON . ' </a></td>'; }
}
echo "</table><br><br>";
?>
<input type="submit" name="submit1" value="delete selected">
</form>

<br><br>
<?php
	echo "« ";
for ($page=1;$page <= $nop; $page++) {
  echo '<a class="email-address" href="deletesongfahad.php?page=' . $page . '">' . $page . '</a>';
  if ($nop > $page) {
  	echo '<text class="email-address"> , </text>';
  }
}
	echo " »";

include '../footer.php';

if(isset($_POST["submit1"]))
{
	$box=$_POST['num'];
	while (list ($key,$val) = @each ($box)) 
	{	
	   mysqli_query($mysqli,"delete from visitors where ID=$val"); 
	}
?>
	<script type="text/javascript">
	window.location.href=window.location.href;
	</script>
	<?php
}

?>


</body>
</html>
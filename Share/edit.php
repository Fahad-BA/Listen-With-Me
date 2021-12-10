<?php
 include 'style.php';
 include '../config.php';

###########################################################

$sql = "SELECT * FROM visitors ORDER BY ID DESC";
$results = mysqli_query($mysqli,$sql);
$nor = mysqli_num_rows($results);
$nop = ceil($nor/$rpp);
$rpp = 15;

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
                echo '<td><a target="_blank" href=' . $row['YouTube'] . '><img src="../img/y.png"</a></td>';
                echo '<td><a target="_blank" href=' . $row['Soundcloud'] . '><img src="../img/s.png"</a></td>';
}
echo "</table><br><br>";
?>
<input type="submit" name="submit1" value="delete selected">
</form>


<?php
for ($page=1;$page<=$nop;$page++) {
  echo '<a class="email-address" href="edit.php?page=' . $page . '">' . $page . '</a> ';
}

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
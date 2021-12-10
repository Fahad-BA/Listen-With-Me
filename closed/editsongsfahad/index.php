<?php
require_once "../config.php";
 $YON = '<img src="../img/y-on.png">';
 $YOF = '<img src="../img/y-of.png">';
 $SON = '<img src="../img/s-on.png">';
 $SOF = '<img src="../img/s-of.png">';

$sql = "SELECT * FROM visitors ORDER BY ID DESC";
$results = mysqli_query($mysqli,$sql);
?>
<html>
<head>
<title>Edit Songs</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" src="users.js" type="text/javascript"></script>
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
<tr class="listheader">
<td></td>
<td>Song Name</td>
<td>SoundCloud</td>
<td>YouTube</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($results)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><input type="checkbox" name="users[]" value="<?php echo $row["ID"]; ?>" ></td>
<td><?php echo $row["Name"]; ?></td>
<?php
                if ($row['YouTube'] == NULL) { echo '<td>' . $YOF . '</td>'; }
                else { echo '<td><a target="_blank" href=' . $row['YouTube'] . '>' . $YON . ' </a></td>'; }
                if ($row['Soundcloud'] == NULL) { echo '<td>' . $SOF . '</td>'; }
                else { echo '<td><a target="_blank" href=' . $row['Soundcloud'] . '>' . $SON . ' </a></td>'; }
?>
</tr>
<?php
$i++;
}
?>
<tr class="listheader">
<td colspan="4"><input type="button" name="update" value="Update" onClick="setUpdateAction();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>
</tr>
</table>
</form>
</div>
</body></html>
 <?php
$mysqli = new mysqli("localhost", "fhidanco_songs", "213325-Fx919", "fhidanco_songs");
 if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
if (!mysqli_set_charset($mysqli, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($mysqli));
    exit();
}
?>

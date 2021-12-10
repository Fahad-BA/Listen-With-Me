<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
<html lang="ar">
<head itemscope="" itemtype="http://schema.org/WebSite">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../css/landing-page.css" rel="stylesheet" />
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        
        .admin{
            color:white;
            text-shadow: 1px 1px #000000;
        }
        
        .pull-left{
            color:black;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body style="background-color:#cfcfc4;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Dashboard</h2>
                    </div>
                    <?php

                    include 'sessions.php';
                    echo '<a href="logout.php" class="btn btn-danger">Sign Out from ';
                    echo htmlspecialchars($_SESSION["username"]);
                    echo "</a>";
                    echo "<br><br>";

                    require_once '../config.php';
                    $YON = '<img src="../img/y-on.png">';
                    $SON = '<img src="../img/s-on.png">';

                    $rpp = 10;
                    $sql = "SELECT * FROM visitors ORDER BY ID DESC";
                    $results = mysqli_query($mysqli,$sql);
                    $nor = mysqli_num_rows($results);
                    $nop = ceil($nor/$rpp);

                    if (!isset($_GET['page'])) {
                      $page = 1;
                    } else {
                      $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page-1)*$rpp;

                    $sql = 'SELECT * FROM visitors ORDER BY ID DESC LIMIT ' . $this_page_first_result . ',' .  $rpp;
                    $result = mysqli_query($mysqli, $sql);
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table>";
                            while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . '<p class="songname">' . $row['Name'] . "</p></td>";
                                    if ($row['YouTube'] == !NULL) { echo '<td><a target="_blank" href=' . $row['YouTube'] . '>' . $YON . ' </a></td>'; }
                                    if ($row['Soundcloud'] == !NULL) { echo '<td><a target="_blank" href=' . $row['Soundcloud'] . '>' . $SON . ' </a></td>'; }
                                        echo "<td>";
                                            //echo "<a href='update.php?ID=". $row['ID'] ."' title='Update Record' data-toggle='tooltip' class='admin'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?ID=". $row['ID'] ."' title='Delete Record' data-toggle='tooltip' class='admin'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";

                    	echo "« ";
                    for ($page=1;$page <= $nop; $page++) {
                      echo '<a class="email-address" href="index.php?page=' . $page . '">' . $page . '</a>';
                      if ($nop > $page) {
  	                    echo '<text class="email-address"> , </text>';
                      }
                    }
	                    echo " »";

                    } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

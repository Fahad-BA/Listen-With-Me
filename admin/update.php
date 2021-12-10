<?php
include "../config.php"

$sql = "UPDATE visitors SET Name=$Name WHERE id=242";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $Name; ?>">
                            <span class="help-block"><?php echo $Name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($YouTube_err)) ? 'has-error' : ''; ?>">
                            <label>YouTube</label>
                            <input type="text" name="SoundCloud" class="form-control" value="<?php echo $YouTube; ?>">
                            <span class="help-block"><?php echo $YouTube_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SoundCloud_err)) ? 'has-error' : ''; ?>">
                            <label>SoundCloud</label>
                            <input type="text" name="SoundCloud" class="form-control" value="<?php echo $SoundCloud; ?>">
                            <span class="help-block"><?php echo $SoundCloud_err;?></span>
                        </div>
                        <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
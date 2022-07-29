<?php
    if (isset($_POST["bookid"]) && !empty($_POST["bookid"])) {
       require_once 'config.php';

       $sql = "DELETE FROM books WHERE bookid = ?";
       if ($stmt = mysqli_prepare($link, $sql)) {
           mysqli_stmt_bind_param($stmt, "i", $param_id);
           $param_id = trim($_POST["bookid"]);

           if(mysqli_stmt_execute($stmt)) {
               header('localhost : index.html');
               exit();
           } else {
               echo "Oops! Something went wrong. Please try again later.";
           }
       }
        mysqli_stmt_close($stmt);

    } else {
        if(empty(trim($_GET["id"]))) {
            header("location: error.php");
            exit();
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
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
                    <h1>Delete Record</h1>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="alert alert-danger fade in">
                        <input type="text" name="bookid" value="<?php echo trim($_GET["bookid"]);?>">
                        <p>Are you sure you want to delete this record?</p> <br>
                        <p>
                            <input type="submit" class="btn btn-danger" value="Yes">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

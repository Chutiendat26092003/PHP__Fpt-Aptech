<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Record</title>
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
                    <h1>View Record</h1>
                </div>
                <?php
                require_once 'config.php';

                if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                    $id = trim($_GET["id"]);

                    $sql = "SELECT * FROM employees WHERE id = ?";
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        mysqli_stmt_bind_param($stmt, "i", $param_id);

                        $param_id = $id;

                        if(mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);

                            if(mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>Address</th>";
                                echo "<th>Salary</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['salary'] . "</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";

                                echo "<div class='card' style='width: 18rem;'>";
                                echo "<img src='' class='card-img-top' alt='...'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                                echo "<p class='card-text'>" . $row['address'] . "</p>";
                                echo "<p class='card-text'>" . $row['salary'] . "</p>";
                                echo "<a href='index.php' class='btn btn-primary'>Go somewhere</a>";
                                echo "</div>";
                                echo "</div>";

                                mysqli_free_result($result);
                            } else {
                                header("location: error.php");
                                exit();
                            }

                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    mysqli_stmt_close($stmt);

                    mysqli_close($link);
                } else {
                    header("location: error.php");
                    exit();
                }
                ?>

                <a href="index.php" class="btn btn-primary">OK</a>

            </div>
        </div>
    </div>
</div>
</body>
</html>


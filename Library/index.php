<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2 {
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }

    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix title">
                    <h2 class="pull-left">Book Details</h2>
                    <a href="search.php" class="btn btn-warning pull-right">Search Books</a>
                </div>
                <?php
                require_once 'config.php';

                $sql = "SELECT * FROM books";
                if($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Title</th>";
                                    echo "<th>ISBN</th>";
                                    echo "<th>Pub Year</th>";
                                    echo "<th>Avaliable</th>";
                                    echo "<th>Author Id</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                    echo "<td>" . $row['bookid'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['ISBN'] . "</td>";
                                    echo "<td>" . $row['pub_year'] . "</td>";
                                    echo "<td>" . $row['available'] . "</td>";
                                    echo "<td>" . $row['authorid'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        echo "</table>";

                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>


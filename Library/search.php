<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Record</title>
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
                <div class="page-header">
                    <h2>Search Record</h2>
                </div>

                <?php
                require_once 'config.php';
                $title = "";

                if($_SERVER["REQUEST_METHOD"] == "POST")  {
                    $title = trim($_POST["name"]);
                    if(!empty($title)) {
                        $sql = "SELECT * FROM books WHERE title LIKE '%{$title}%'";
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
                                            echo "<td>" . $row['authorid'] . "</td>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['ISBN'] . "</td>";
                                            echo "<td>" . $row['pub_year'] . "</td>";
                                            echo "<td>" . $row['available'] . "</td>";
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

                    }

//                    mysqli_close($link);
                } else {
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
                }
                ?>
                <p>Please enter the name of the book you want to search.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $title; ?>">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Search">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

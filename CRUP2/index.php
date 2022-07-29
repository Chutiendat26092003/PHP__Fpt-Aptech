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
        .title {
            display: flex;
            justify-content: space-around;
            align-items: center;

        }

    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix title">
                    <a href="search.php" class="btn btn-warning pull">Search</a>
                    <h2 class="pull">Book Details</h2>
                    <a href="create.php" class="btn btn-success pull">Add New</a>
                </div>
                <?php
                    require_once 'config.php';

                    $sql = "SELECT * FROM books";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Book ID</th>";
                            echo "<th>Author ID</th>";
                            echo "<th>Title</th>";
                            echo "<th>ISBN</th>";
                            echo "<th>Pub_Year</th>";
                            echo "<th>Available</th>";
                            echo "<th>Action</th>";
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
                                echo "<td>";
                                echo "<a href='read.php?id=". $row['bookid']."'title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='update.php?id=". $row['bookid']."'title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id=". $row['bookid']."'title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else {
                        echo "ERROR: could not able to execute $sql." . mysqli_error($link);
                    }
                ?>
            </div>
            <div class="col-md-12">
                <div class="page-header clearfix title">
<!--                    <a href="serach.php" class="btn btn-warning pull">Search</a>-->
                    <h2 class="pull">Author Details</h2>
<!--                    <a href="create.php" class="btn btn-success pull">Add New</a>-->
                </div>
                <?php
                require_once 'config.php';

                $sql = "SELECT * FROM authors";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Author ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['authorid'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>";
                            echo "<a href='read.php?id=". $row['authorid']."'title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=". $row['authorid']."'title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?id=". $row['authorid']."'title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        mysqli_free_result($result);
                    } else {
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else {
                    echo "ERROR: could not able to execute $sql." . mysqli_error($link);
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

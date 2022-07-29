<?php
$_SESSION['username'] = "Admin";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Portfolio</title>
    <style type="text/css">
        #gallery {
            width: 1000px;
            margin: 0 auto;
            font-family: Arial;
        }

        .gallery-display {
            display: inline-flex;
            margin: 0 auto;
            width: 1000px;
        }

        .gallery-item {
            width: 25%;
            display: block;
            margin: 10px;
            background-color: #cacece;
            text-align: center;

        }

        .gallery-item img {
            width: 100%;
        }

        .gallery-upload{
            margin: 0 auto;
            width: 200px;
        }

        .gallery-upload input{
            display: block;
            padding: 10px;
            margin: 10px;
        }

        .gallery-upload button {
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="gallery">
    <div class="gallery-display">
        <?php
            include_once 'dbh.php';

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-item">
                            <img src="img/'. $row["imgFullNameGallery"] .'" alt="">
                            <div class="content">
                                <h3>'. $row["titleGallery"] .'</h3>
                                <p>'. $row["descGallery"] .'</p>
                            </div>
                          </div>';
                }
            }
        ?>
    </div>

    <?php
        if(isset($_SESSION['username'])) {
            echo ' <div class="gallery-upload">
                      <h2>Upload</h2>
                      <form action="gallery.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="filename" placeholder="File name...">
                            <input type="text" name="filetitle" placeholder="Image title...">
                            <input type="text" name="filedesc" placeholder="Image description...">
                            <input type="file" name="file">
                            <button type="submit" name="submit">UPLOAD</button>
                      </form>
                   </div>';
        }
    ?>



</div>
</body>
</html>

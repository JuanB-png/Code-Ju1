<?php

require_once("database/dbconnect.php");
require_once("components/functions.php");
$true_or_flase = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link id="lighttheme" rel="stylesheet" href="style/stylelight.css">
    <title>Home</title>
    <script src="script/script.js" defer></script>
</head>

<body class="d-flex justify-content-between flex-column index_body">
    <?php require_once("components/navbar.php"); ?>

    <form method="post">
        <!-- <?php echo "Storage left on server: " . StorageLeft(); ?> -->
        <p id="i"></p>
        <div class="cards-body">
            <?php

            if (!isset($_SESSION['search'])) {
                foreach (GetData($pdo) as $code) {
                    echo "<div class='cards-layout'>";
                    echo "<p></p>";
                    echo "<div class='d-flex flex-column cardwidth'>";
                    echo "<div class='d-flex flex-row justify-content-between'>";
                    echo "<h3><a href='pages/viewcode.php?codeid={$code['codeid']}' class='acoller'>Title: {$code['title']}</a></h3>";
                    echo "<p>Upload date: {$code['uploaddate']}</p>";
                    echo "</div>";
                    echo "<p></p>";
                    echo "<div class='d-flex justify-content-around'>";
                    echo "<p>Language: {$code['language']}</p>";
                    echo "<p>Creator: {$code['creator']}</p>";
                    echo "<p>Description: {$code['description']}</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<p></p>";
                }
            } else {
                foreach (SearchData($pdo, $_SESSION['search']) as $code) {
                    echo "<div class='cards-layout'>";
                    echo "<p></p>";
                    echo "<div class='d-flex flex-column cardwidth'>";
                    echo "<div class='d-flex flex-row justify-content-between'>";
                    echo "<h3><a href='pages/viewcode.php?codeid={$code['codeid']}' class='acoller'>Title: {$code['title']}</a></h3>";
                    echo "<p>Upload date: {$code['uploaddate']}</p>";
                    echo "</div>";
                    echo "<p></p>";
                    echo "<div class='d-flex justify-content-around'>";
                    echo "<p>Language: {$code['language']}</p>";
                    echo "<p>Creator: {$code['creator']}</p>";
                    echo "<p>Description: {$code['description']}</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<p></p>";
                }
            }

            ?>
        </div>
    </form>
</body>

</html>
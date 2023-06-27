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
    <link rel="stylesheet" type="text/css" href="style/style.css"><title>Home</title>
</head>

<body>
    <?php require_once("components/navbar.php"); ?>

    <form method="post">
        <?php echo "Storage left on server: " . StorageLeft(); ?>
        <p></p>
        <a href="pages/addcode.php">Add code</a>
        <div class="cards-layout">
            <?php

            if (!isset($_SESSION['search'])) {
                foreach (GetData($pdo) as $code) {
                    echo "<p>Title: {$code['title']}</p>";
                    echo "<p>Creator: {$code['creator']}</p>";
                    echo "<p>Language: {$code['language']}</p>";
                    echo "<p>Upload date: {$code['uploaddate']}</p>";
                    echo "<p>Description: {$code['description']}</p>";
                    echo "<p><a href='pages/viewcode.php?codeid={$code['codeid']}'>View code</a></p>";
                }
            } else {
                foreach (SearchData($pdo, $_SESSION['search']) as $code) {
                    echo "<p>Title: {$code['title']}</p>";
                    echo "<p>Language: {$code['creator']}</p>";
                    echo "<p>Language: {$code['language']}</p>";
                    echo "<p>Upload date: {$code['uploaddate']}</p>";
                    echo "<p>Description: {$code['description']}</p>";
                    echo "<p><a href='pages/viewcode.php?codeid={$code['codeid']}'>View code</a></p>";
                }
            }

            ?>
        </div>
    </form>
</body>

</html>
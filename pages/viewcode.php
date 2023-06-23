<?php

require_once("../database/dbconnect.php");
require_once("../components/functions.php");

$codedata = ViewSpecific($pdo, $_GET['codeid']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing: <?php echo $codedata['title']; ?></title>
</head>

<body>
    <?php require_once("../components/navbar.php"); ?>

    <?php

    echo $codedata['title'];
    echo "<pre>" . htmlspecialchars($codedata['code']) . "</pre>";
    echo $codedata['uploaddate'];
    echo "<a href='editcode.php?codeid={$codedata['codeid']}'>Edit</a>";

    ?>
</body>

</html>
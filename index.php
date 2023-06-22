<?php

require_once("database/dbconnect.php");
require_once("components/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <form method="post">
        <?php

        foreach (GetData($pdo) as $code) {
            echo $code['title'];
            echo "<pre>" . htmlspecialchars($code['code']) . "</pre>";
            echo $code['uploaddate'];
            echo "<a href='pages/viewcode.php?id={$code['codeid']}'>view</a>";
        }

        ?>
    </form>
</body>

</html>
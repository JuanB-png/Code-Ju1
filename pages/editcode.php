<?php

$uploaddate = date('Y-m-d');
require_once("../database/dbconnect.php");
require_once("../components/functions.php");

$codedata = ViewSpecific($pdo, $_GET['codeid']);

if (isset($_POST["title"])) {
    if (!empty($_POST["code"]) && !empty($_POST["title"]))
        EditCode($pdo, $_POST["title"], $_POST["code"], $_GET['codeid'], $uploaddate);
    header("location: ../");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add code</title>
</head>

<body>
    <?php require_once("../components/navbar.php"); ?>
    <form method="post">
        <input value="<?php echo $codedata['title'] ?>" placeholder="Title" type="text" name="title">
        <textarea placeholder="Your code" name="code" id="" cols="30" rows="10"><?php echo $codedata['code'] ?></textarea>
        <button type="submit">Upload code</button>
    </form>
</body>

</html>
<?php

$uploaddate = date('Y-m-d');
require_once("../database/dbconnect.php");
require_once("../components/functions.php");
$true_or_flase = false;
$codedata = ViewSpecific($pdo, $_GET['codeid']);

NotExists($codedata['codeid']);

if (isset($_POST["title"])) {
    if (!empty($_POST["code"]) && !empty($_POST["title"]) && !empty($_POST['language']) && !empty($_POST['description']) && !empty($_POST['creator']))
        EditCode($pdo, $_POST["title"], $_POST['creator'], $_POST["code"], $_GET['codeid'], $uploaddate, $_POST['language'], $_POST['description']);
    header("location: viewcode.php?codeid={$_GET['codeid']}");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link id="lighttheme" rel="stylesheet" href="../style/stylelight.css">
    <title>Add code</title>
    <script src="../script/script.js" defer></script>
</head>

<body>
    <?php require_once("../components/navbar.php"); ?>
    <form method="post">
        <input value="<?php echo $codedata['title'] ?>" placeholder="Title" type="text" name="title">
        <input value="<?php echo $codedata['creator'] ?>" placeholder="Your name" type="text" name="creator">
        <select selected="selected" name="language">
            <?php
            foreach ($programminglanguages as $language => $alias) {
                if ($codedata['language'] == $alias) {
                    echo "<option selected value='{$alias}'>{$language}</option>";
                } else {
                    echo "<option value='{$alias}'>{$language}</option>";
                }
            }
            ?>
        </select>
        <textarea placeholder="Your code" name="code" id="" cols="30" rows="10"><?php echo $codedata['code'] ?></textarea>
        <input value="<?php echo $codedata['description'] ?>" placeholder="Short description" name="description" type="text">
        <button type="submit">Upload code</button>
    </form>
</body>

</html>
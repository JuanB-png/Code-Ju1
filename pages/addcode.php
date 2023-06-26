<?php
$uploaddate = date('Y-m-d');
require_once("../database/dbconnect.php");
require_once("../components/functions.php");

if (isset($_POST["title"])) {
    if (!empty($_POST["code"]) && !empty($_POST["title"]) && !empty($_POST['language']))
        AddCode($pdo, $_POST["title"], $_POST["code"], $uploaddate, strtolower($_POST['language']));
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
    <form method="post">
        <input placeholder="Title" type="text" name="title">
        <input placeholder="Programming language" type="text" name="language">
        <textarea placeholder="Your code" name="code" id="" cols="30" rows="10"></textarea>
        <button type="submit">Upload code</button>
    </form>
</body>

</html>
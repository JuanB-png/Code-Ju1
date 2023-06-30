<?php
require_once("../database/dbconnect.php");
require_once("../components/functions.php");
$true_or_flase = false;
$codedata = ViewSpecific($pdo, $_GET['codeid']);

NotExists($codedata['codeid']);

if (isset($_POST['deletecode'])) {
    DeleteCode($pdo, $_GET['codeid']);
    header("location: ../");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing: <?php echo $codedata['title']; ?></title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightElement(block);
            });
        });
    </script>
    <script src="../script/script.js" defer></script>

</head>

<body>
    <?php require_once("../components/navbar.php"); ?>
    <form method="post">
        <?php
        echo "<p>{$codedata['title']}</p>";
        echo "<p>{$codedata['language']}</p>";
        echo "<p>{$codedata['creator']}</p>";
        echo "<pre><code style='height:500px; width:98%; border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;' class='{$codedata['language']}'>" . htmlspecialchars($codedata['code']) . "</code></pre>";
        echo "<p>{$codedata['uploaddate']}</p>";
        echo "<p>{$codedata['description']}</p>";
        echo "<button id='Warn' onclick='WarnUser()' name='delete'>Delete</button>";
        echo "<a href='editcode.php?codeid={$codedata['codeid']}'>Edit</a>";

        ?>
        <a href="../">Home</a>
    </form>
</body>

</html>
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightElement(block);
            });
        });
    </script>
</head>

<body>
    <?php require_once("../components/navbar.php"); ?>

    <?php
    echo $codedata['title'];
    echo "<pre><code class='php'>" . htmlspecialchars($codedata['code']) . "</code></pre>";
    echo $codedata['uploaddate'];
    echo "<a href='editcode.php?codeid={$codedata['codeid']}'>Edit</a>";
    ?>
</body>

</html>
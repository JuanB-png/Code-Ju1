<?php

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    header('location: /');
    exit();
}

?>

<form method="post">
    <input placeholder="Search" value="<?php if (isset($_SESSION['search'])) echo $_SESSION['search']; ?>" name="search" type="text">
</form>
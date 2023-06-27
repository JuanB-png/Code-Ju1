<?php

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    header('location: /');
    exit();
}

?>
<div class="i">
    <form method="post" class="i">
        <input placeholder="Search" value="<?php if (isset($_SESSION['search'])) echo $_SESSION['search']; ?>" name="search" type="text">
    </form>
</div>
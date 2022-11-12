<!-- head part included -->
<?php
session_start();
// require_once "login_sistem/db.php";

include "includes/head.php";

?>

<body>
    <?php
    if (!isset($_SESSION["user_id"])) {

        header("Location:includes/login_form.php?please-log-in");
    }
    ?>
    <!-- body part included -->
    <?php include "includes/body.php"; ?>


    <!-- including main page  -->
    <?php
    include_once "includes/main-page/main_page.php"
    ?>

</body>

</html>
<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/login.css">
    <link href="../style/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="../style/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form action="../login_sistem/login.ini.php" method="POST">
            <div>
                <input type="text" name="u" placeholder="Username or Email" />
                <?php if (!empty($systemErrors['username'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['username']); ?></span>
                <?php } ?>
            </div>

            <div>
                <input type="password" name="p" placeholder="Password" class="mt-2" />
                <?php if (!empty($systemErrors['password'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['password']); ?></span>
                <?php } ?>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large mt-2">Login</button>
        </form>
        <a href="../includes/sign_up_form.php"><button type="submit" class="btn btn-primary btn-block btn-large mt-4">Sing up</button></a>

    </div>
</body>

</html>
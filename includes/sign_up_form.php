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
        <h1>Sign in</h1>

        <form action="../login_sistem/sign_up.ini.php" method="post">
            <div>
                <input type="text" name="u" id="user-name" placeholder="Username" value="<?php if (isset($_POST["sign_up"])) echo $u_name ?>" />
                <?php if (!empty($systemErrors['username'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['username']); ?></span>
                <?php } ?>
            </div>
            <div>
                <input type="text" name="e" id="user-email" placeholder="Email" class="mt-2" />
                <?php if (!empty($systemErrors['email'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['email']); ?></span>
                <?php } ?>
            </div>

            <div>
                <input type="password" name="p" id="user-password" placeholder="Password" class="mt-2" />
                <?php if (!empty($systemErrors['password'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['password']); ?></span>
                <?php } ?>
            </div>
            <div>
                <input type="password" name="rp" id="retry-password" placeholder="Retry Password" class="mt-2" />
                <?php if (!empty($systemErrors['r_password'])) { ?>
                    <span class="form-text text-danger bg-white"><?php echo htmlspecialchars($systemErrors['r_password']); ?></span>
                <?php } ?>
            </div>
            <button type="submit" name="sign_up" class="btn btn-primary btn-block btn-large mt-2">Sing up</button>

        </form>
        <a href="../includes/login_form.php"><button type="submit" id="submit" class="btn btn-primary btn-block btn-large mt-4">login</button></a>
        <p class="form-message"></p>
    </div>
    </div>
</body>

</html>
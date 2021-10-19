<!DOCTYPE html>
<html>

<head>
    <title>E-dokumen</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="assets/img/2.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url('assets'); ?>/img/0.svg">
        </div>
        <div class="login-content">
            <form action=<?php echo "Dashboard" ?>>
                <img src="<?= base_url('assets'); ?>/img/logo1.png">
                <h2 class="title">Login</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>NIK</h5>
                        <input type="text" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input">
                    </div>
                </div>

                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets'); ?>/js/main.js"></script>
</body>

</html>
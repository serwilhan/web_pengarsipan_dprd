<!DOCTYPE html>
<html>

<head>
    <title>E-dokumen</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/dist/css/login-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="<?= base_url('assets'); ?>/dist/img/2.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url('assets'); ?>/dist/img/0.svg">
        </div>
        <div class="login-content">

            <form action=<?= base_url('loginpage'); ?> method="POST">
                <img src="<?= base_url('assets'); ?>/dist/img/logo1.png">
                <h2 class="title">Login</h2>

                <?= $this->session->flashdata('message'); ?>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>NIK</h5>
                        <input type="text" class="input" name="nik" id="nik" value="<?= set_value('nik'); ?>">
                        <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password">
                        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <input type="submit" class="btn" value="Login">
            </form>

        </div>
    </div>

    <script type="text/javascript" src="<?= base_url('assets'); ?>/dist/js/main.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
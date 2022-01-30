
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<span style='color:red;font-size:15px;'><?= session('msg');?></span>
    <form action="<?= "do_login" ?>" method="post">
        Username :
        <input type="text" name="username" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>"/><br>
        Pw :
        <input type="password" name="password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>"/><br>

        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?>> Remember Me

        <button type="submit">Login</button>
    </form>
</body>
</html>
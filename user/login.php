<?php
session_start();

var_dump($_SESSION);

// $err = $_SESSION;
// $_SESSION = array();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>

<body>
    <h2>ログインフォーム</h2>
    <form action="top.php" method="POST">
        <p>
            <label for="user_name">ユーザ名</label>
            <input type="text" name="username">
            <?php if (isset($err['user_name'])) : ?>
        <p><?php echo $err['user_name']; ?></p>
    <?php endif; ?>
    </p>
    <p>
        <label for="password">パスワード</label>
        <input type="text" name="password">
        <?php if (isset($err['password'])) : ?>
    <p><?php echo $err['password']; ?></p>
<?php endif; ?>
</p>
<p>
    <input type="submit" value='ログイン'>
</p>
    </form>
    <a href="signup_form.php">新規登録はこちら</a>
</body>

</html>
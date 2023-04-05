<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ登録画面</title>
</head>
<body>
        <h2>ユーザ登録フォーム</h2>
        <form action="register.php" method="POST">
            <p>
                <label for="user_name">ユーザ名</label>
                <input type="text" name="username">
                <?php if (isset($err['username'])) : ?>
        <p><?php echo $err['username']; ?></p>
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
                <label for="password_conf">パスワード確認</label>
                <input type="text" name="password_conf">
                <?php if (isset($err['password_conf'])) : ?>
        <p><?php echo $err['password_conf']; ?></p>
    <?php endif; ?>
            </p>
            <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
            <p>
                <input type="submit" value="新規登録">
            </p>
        </form>
</body>

</html>
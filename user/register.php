<?php
session_start();

require_once('./UserLogic.php');

$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');

if(!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエストです');
}
unset($_SESSION['csrf_token']);

if (!$username = filter_input(INPUT_POST, 'username')) {
    $err['username'] = 'ユーザ名を記入してください';
}
if (!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを記入してください';
}

if (count($err) > 0) {
    $_SESSION = $err;
    header('Location:./login.php');
    exit();
}
echo 'ログインしました';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ登録完了画面</title>
</head>

<body>
    <?php if (count($err) > 0) : ?>
        <?php foreach ($err as $e) : ?>
            <p><?php echo $e ?></p>
        <?php endforeach; ?>

    <?php else : ?>
        <p>ユーザ登録が完了しました。</p>
    <?php endif; ?>
    <a href="./login.php">ログイン画面</a>
</body>

</html>
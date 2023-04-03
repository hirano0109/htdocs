<?php

require_once('dbc.php');
$dbc = new DBC('blog');
$blogData = $dbc->getBlog();
$blogData2 = $dbc->getPublishBlog();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>

<body>
    <h2>ブログ一覧</h2>
    <p><a href="./form.html">新規作成</a></p>
    <table>
        <tr>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>投稿日時</th>
        </tr>
        <?php foreach ($blogData as $column) : ?>
            <tr>
                <td><?php echo $column['title'] ?></td>
                <td><?php echo $column['category'] ?></td>
                <td><?php echo $column['post_at'] ?></td>
                <td><a href="./detail.php?id=<?php echo $column['id'] ?>">詳細</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <p>↓公開中↓</p>
    <table>
        <tr>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>投稿日時</th>
            <th>公開設定</th>
        </tr>
        <?php foreach ($blogData2 as $column) : ?>
            <tr>
                <td><?php echo $column['title'] ?></td>
                <td><?php echo $column['category'] ?></td>
                <td><?php echo $column['post_at'] ?></td>
                <td><?php echo $column['publish_status'] ?></td>
                <td><a href="./detail.php?id=<?php echo $column['id'] ?>">詳細</td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
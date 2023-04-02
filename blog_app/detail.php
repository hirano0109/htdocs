<?php

require_once('dbc.php');
$dbc = new Dbc();
$id = $_GET['id'];
$result = $dbc->getABlog($id);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>

<body>
    <h2>ブログ詳細</h2>
    <table>
        <tr>
            <th>タイトル</th>
            <th>日時</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>公開ステータス</th>
        </tr>
        <tr>
            <td><?php echo $result['title'] ?></td>
            <td><?php echo $result['post_at'] ?></td>
            <td><?php echo $result['category'] ?></td>
            <td><?php echo $result['content'] ?></td>
            <td><?php echo $result['publish_status'] ?></td>
            <td><a href="/update_form.php?id=<?php echo $column['id'] ?>">編集</td>
        </tr>
    </table>
</body>
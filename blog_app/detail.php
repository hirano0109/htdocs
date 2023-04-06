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
    <link href="form.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h2>ブログ詳細</h2>
            <table>
                <tr>
                    <th>タイトル</th>
                    <td><?php echo $result['title'] ?></td>
                </tr>
                <tr>
                    <th>日時</th>
                    <td><?php echo $result['post_at'] ?></td>
                </tr>
                <tr>
                    <th>カテゴリ</th>
                    <td><?php echo $result['category'] ?></td>
                </tr>
                <tr>
                    <th>本文</th>
                    <td><?php echo $result['content'] ?></td>
                </tr>
                <tr>
                    <th>公開ステータス</th>
                    <td><?php echo $result['publish_status'] ?></td>
                </tr>
                <tr>
                    <td><a href="./update_form.php?id=<?php echo $id ?>">編集</td>
                </tr>
            </table>
            <table>
                <tr>
            </table>
        </div>
    </div>
</body>
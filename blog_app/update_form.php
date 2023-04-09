<?php
require_once('dbc.php');
$dbc = new Dbc();
$id = $_GET['id'];
$result = $dbc->getABlog($id);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$publish_status = (int)$result['publish_status'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogForm</title>
    <link href="form.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="wrapper">
        <head>
            <h2>ブログ更新フォーム</h2>
        </head>
        <main>
            <form action="blog_update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="<?php echo $title ?>" required>
                <label>
                    <p>本文：</p>
                    <textarea name="content" id="content" cols="30" rows="10" required><?php echo $content ?></textarea>
                </label>
                <label>
                    <p>カテゴリ：</p>
                    <select name="category">
                        <option value="main" <?php if ($category == 'main') echo "selected" ?>></option>
                        <option value="b" <?php if ($category == 'b') echo "selected" ?>></option>
                    </select>
                </label>
                <label>
                    <p>日時</p>
                    <input type="date" name="post_at" value="<?php echo $post_at ?>" required>
                </label>
                <div class="publish_status">
                    <p>公開設定</p>
                    <label><input type="radio" name="publish_status" value="1" <?php if ($publish_status === 1) echo "checked" ?>>公開</label>
                    <label><input type="radio" name="publish_status" value="2" <?php if ($publish_status  === 2) echo "checked" ?>>非公開</label>
                </div>
                <input type="submit" value="送信">
            </form>
    </div>
    <span><?php echo $message; ?></span>
    </main>
</body>

</html>
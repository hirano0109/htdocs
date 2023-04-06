<?php
require_once('dbc.php');
$dbc = new Dbc();
$id= $_GET['id'];
$result = $dbc->getABlog($id);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$publish_status = (int)$result['publish_status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogForm</title>
    <link href="form.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="wrapper">
    <h2>ブログ更新フォーム</h2>
    <form action="blog_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <p>ブログタイトル：</p>
        <input type="text" name="title" value="<?php echo $title?>">
        <p>日時</p>
        <input type="date" name="post_at" value="<?php echo $post_at?>">
        <p>ブログ本文：</p>
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $content?></textarea>
        <br>
        <p>カテゴリ：</p>
        <select name="category">
            <option value="1" <?php if($category === 1) echo "selected"?>>日常</option>
            <option value="2" <?php if($category === 2) echo "selected"?>>プログラミング</option>
        </select>
        <br>
        <input type="radio" name="publish_status" value="1"  <?php if($publish_status === 1) echo "checked"?>>公開
        <input type="radio" name="publish_status" value="2" <?php if($publish_status  === 2) echo "checked"?>>非公開
        <br>
        <input type="submit" value="送信">
    </form>
    </div>
</body>
</html>
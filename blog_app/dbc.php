<?php
class Dbc
{
    // protected $table_name;

    // function __construct($table_name)
    // {
    //     $this->$table_name = $table_name;
    // }
    private function dbConnect()
    {
        $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
        $user = 'root';
        $pass = 'root';
        try {
            $dbh = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            echo '接続失敗' . $e->getMessage();
            exit();
        };
        return $dbh;
    }

    public function getBlog()
    {
        $dbh = $this->dbConnect();
        $sql = 'SELECT * FROM mst_blog';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getABlog($id)
    {
        $id = $_GET['id'];
        if (empty($id)) {
            exit('idが不正です');
        }
        $dbh = $this->dbConnect();

        $stmt = $dbh->prepare('SELECT * FROM mst_blog WHERE id = :id');
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            exit('ブログがありません');
        }
        return $result;
    }

    public function blogCreate($blogs)
    {
        $sql = 'INSERT INTO
            mst_blog(title, content, category, publish_status)
        VALUES
            (:title, :content, :category, :publish_status)';

        $dbh = $this->dbConnect();
        $dbh->beginTransaction();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
            $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
            $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
            $stmt->execute();
            $dbh->commit();
            echo 'ブログを投稿しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
        }
    }
    public function blogUpdate($blogs)
    {
        $sql = 'UPDATE 
            mst_blog
            SET
            (title=:title, content=:content, category, publish_status)
        VALUES
            (:title, :content, :category, :publish_status)';

        $dbh = $this->dbConnect();
        $dbh->beginTransaction();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
            $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
            $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
            $stmt->bindValue(':publish_status', $blogs['publish_status'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $blogs['id'], PDO::PARAM_INT);
            
            $stmt->execute();
            $dbh->commit();
            echo 'ブログを投稿しました';
        } catch (PDOException $e) {
            $dbh->rollBack();
            exit($e);
        }
    }
}

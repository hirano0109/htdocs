<?php
require_once('dbc.php');

class Blog extends Dbc
{
    protected $table_name = 'blog';
}
?>
<!-- ダブルクォーテーションしないと変数が使えない -->
<!-- 継承で継承元の関数呼び出せる -->
<!-- protected -->
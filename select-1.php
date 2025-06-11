<?php
// DB接続情報（適宜書き換えてください）
$dsn = 'mysql:host=localhost;dbname=memo;charset=utf8';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
    exit;
}

// クエリ実行
$result = $dbh->query('SELECT * FROM sample');

// 結果表示（カラム名は適宜変更してください）
foreach ($result as $row) {
    echo htmlspecialchars($row['column_name']) . "<br>";
}
?>

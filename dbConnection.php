<?php
try { /*DBへ接続*/
    $host = 'db';
    $username = 'root';
    $password = 'root';
    $dbName = 'memo_php';

    $dbh = new PDO("mysql:host=$host; dbname=$dbName; 
                    charset=utf8",
                    $username,
                    $password
                 );
    echo '接続成功';
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!-- try {
    $pdo = new PDO('mysql:host=db;dbname=memo_db', 'root', 'root');
    // echo "接続成功！";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
} -->
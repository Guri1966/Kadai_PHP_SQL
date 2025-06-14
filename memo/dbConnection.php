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
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

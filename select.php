<?php
//    if (isset($_POST["keyword"]) && $_POST["keyword"] !== '') {
//     $keyword = $_POST['keyword'];
//     $keyword = addslashes($keyword); // ← 最低限のエスケープ（完璧ではない）

//     $sql = "SELECT * FROM memo WHERE body LIKE '%$keyword%'";
//     $memo_list = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
//     echo "検索ワード：[" . htmlspecialchars($_POST['keyword']) . "]";
    
// }

    $sql = "SELECT * FROM memo";
    $memo_list = $dbh->query($sql);
?>
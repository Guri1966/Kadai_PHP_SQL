<?php
    if (isset($_POST["body"])) {

        $body = $_POST["body"];
        $date = date("Y-m-d H:i:s");

        // sql文
        $sql = "INSERT INTO memo(body, date) VALUES(
            :body, :date)";
        $stmt = $dbh->prepare($sql);    
    //bindValue関数でバインドする
    $stmt -> bindValue(':body', $body, PDO::PARAM_STR);
    $stmt -> bindValue(':date', $date, PDO::PARAM_STR);
    // SQLを実行
    $stmt->execute();
    }
?>
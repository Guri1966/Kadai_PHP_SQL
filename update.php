<?php
include './dbConnection.php';
//対象のメモを上書きする
if (isset($_POST["memo_id"])) {
    
    $body = $_POST["edit_body"];
    $memo_id = $_POST["memo_id"];

/*sql文*/    
$sql = "UPDATE memo SET body = :body WHERE id = :id";

//bindValue関数でバインドする
$result = $dbh->prepare($sql);
$result->bindValue(':body', $body, PDO::PARAM_STR);
$result->bindValue(':id', $memo_id, PDO::PARAM_INT);
$result->execute();

// 更新後に index.php に戻る（おすすめ）
    header("Location: index.php");
    exit;
}
?>


<!-- /*sql文*/
    $sql = "UPDATE memo SET body = '$body' WHERE id = '$memo_id'";

    /*bindValue関数でバインドする*/
    $result = $dbh->prepare($sql);
    $result->execute(); -->
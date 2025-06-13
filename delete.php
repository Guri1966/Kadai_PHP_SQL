<?php
if (isset($_POST["delete_id"])) {

    $delete_id = $_POST["delete_id"];
    $sql = "DELETE FROM memo WHERE id = :id";
    //bindValue関数でバインドする
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $delete_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
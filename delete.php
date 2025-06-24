<?php
if (isset($_POST["delete_id"])) {

    $delete_id = $_POST["delete_id"];
    $sql = "DELETE FROM memo WHERE id = '$delete_id'";
    //bindValue関数でバインドする
    $result = $dbh->prepare($sql);
    $result->execute();
}
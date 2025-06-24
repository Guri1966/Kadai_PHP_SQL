<?php

//対象のメモを上書きする
if (isset($_POST["memo_id"])) {

    $body = $_POST["edit_body"];
    $memo_id = $_POST["memo_id"];

    /*sql文*/
    $sql = "UPDATE memo SET body = '$body' WHERE id = '$memo_id'";

    //bindValue関数でバインドする
    $result = $dbh->prepare($sql);
    $result->execute();
}
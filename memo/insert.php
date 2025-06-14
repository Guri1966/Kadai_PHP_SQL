<?php
include './dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["body"]) && trim($_POST["body"]) !== "") {

        $body = trim($_POST["body"]);
        $date = date("Y/m/d H:i:s");

        $sql = "INSERT INTO memo (body, date) VALUES (:body, :date)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':body', $body, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
    }

    // POST-Redirect-GET パターン
    header("Location: index.php");
    exit;
}


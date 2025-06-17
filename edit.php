<?php include './dbConnection.php';

if (isset($_POST["edit_id"])){

    $edit_id = $_POST["edit_id"];

$stmt = $dbh->prepare("SELECT * FROM memo WHERE id = :id");
$stmt->bindValue(':id', $edit_id, PDO::PARAM_INT);
$stmt->execute();
$memo_info = $stmt->fetch();

}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ帳 | 編集</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="memo_form">
        <h2>メモ編集</h2>
        <form action="update.php" method="post">     
            <input class="momo_text" type="text" name="edit_body" value="<?php echo $memo_info['body'] ?>">
            <input class="memo_id" type="hidden" name="memo_id" value="<?php echo $memo_info['id'] ?>">
            <input type="submit" value="更新">
        </form>
    </div>
</body>
</html>

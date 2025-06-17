<?php
include './dbConnection.php';

if (isset($_POST["keyword"])) {

// POSTされたキーワードを取得
$keyword = $_POST['keyword'];

//SQL文を準備
$stmt = $dbh->prepare("SELECT * FROM memo WHERE body LIKE :keyword");
$stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
$stmt->execute();

$results = $stmt->fetchAll();

}
 ?>

 <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ帳 | 検索</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
 <div class="container">
     <a href="index.php">← メモ一覧に戻る</a>
     <p>検索ワード：<?php echo $_POST['keyword'] ?></p> 
       <div class="memo_show">
       <?php foreach($results as $memo): ?>
        <div class="memo_item">
           <div class="memo_title">
             <time><?php echo $memo['date'] ?></time>
             <p><?php echo $memo['body'] ?></p>
          </div>
          <div class="btn_area">
             <div class="edit_form">
                <form action="edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $memo['id'] ?>"> 
                    <input type="submit" value="編集">
                </form>
             </div>
             <div class="del_area">
                 <form action="index.php" method="post">
                     <input type="hidden" name="delete_id"  value="<?php echo $memo['id'] ?>">
                     <input type="submit" value="削除">
                 </form>
             </div>
         </div>
     </div>
    </div>   
</div>
<?php endforeach; ?>
</body>
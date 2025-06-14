<?php
    include './dbConnection.php';
    include './select.php';
    // include './insert.php'; ← 削除！！
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メモ帳</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
         <div class="memo_area">
            <div class="memo_form">
                <h2>メモを追加</h2>
                <form action="insert.php" method="post">
                    <input class ="memo_text" type="text" name="body">
                    <input type="submit" value="追加">
                </form>
            </div>
        <div class="memo_show">
        <?php foreach ($memo_list as $memo): ?>
        <div class="memo_item">
          <div class="memo_title">
            <p><?php echo htmlspecialchars($memo['body']) ?></p>
            <time><?php echo $memo['date'] ?></time>
        </div>
           <div class="btn_area">
             <div class="edit_form">
                <form action="">
                    <input type="hidden" name="edit_id" value=""> 
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
    <?php endforeach; ?>
   </div>
    </div>
    </div>         
</body>
</html>

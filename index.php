<?php

include './dbConnection.php';

// 固定処理 
if (isset($_POST['hold_id'])) {
    $hold_id = $_POST['hold_id'];

    try {
        $sql = "UPDATE memo SET invalid = 1 WHERE id = '$hold_id'";
        $result = $dbh->prepare($sql);
        $result->execute();
    } catch (PDOException $e) {
        echo "エラー:" . $edit_id->getMessage();
    }
}

include './insert.php';
include './delete.php';
include './update.php';
include './select.php';

// 固定されたメモを降順に並び替え
$sql = "SELECT * FROM memo ORDER BY invalid DESC,  date;";
$memo_list = $dbh->query($sql);

?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メモ帳</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="memo_area">
            <div class="memo_form">
                <h2>メモを追加</h2>
                <form method="post" action="index.php">
                    <input class="memo_text" type="text" name="body">
                    <input type="submit" value="追加">
                </form>
                <h2>検索</h2>
                <form method="post" action="find.php">
                    <input class="memo_text" type="text" name="keyword" placeholder="検索ワードを入力">
                    <input type="submit" value="検索">
                </form>
            </div>
            <div class="memo_show">
                <?php foreach ($memo_list as $memo): ?>
                    <div class="memo_item">
                        <div class="memo_title">
                            <time><?php echo $memo['date'] ?></time>
                            <p><?php echo $memo['body'] ?></p>
                            <!-- //固定マークの表示-->
                            <?php if ($memo['invalid'] == 1): ?>
                                <i class="pin_icon" style="color: red;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle" viewBox="0 0 16 16">
                                        <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a6 6 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707s.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a6 6 0 0 1 1.013.16l3.134-3.133a3 3 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146m.122 2.112v-.002zm0-.002v.002a.5.5 0 0 1-.122.51L6.293 6.878a.5.5 0 0 1-.511.12H5.78l-.014-.004a5 5 0 0 0-.288-.076 5 5 0 0 0-.765-.116c-.422-.028-.836.008-1.175.15l5.51 5.509c.141-.34.177-.753.149-1.175a5 5 0 0 0-.192-1.054l-.004-.013v-.001a.5.5 0 0 1 .12-.512l3.536-3.535a.5.5 0 0 1 .532-.115l.096.022c.087.017.208.034.344.034q.172.002.343-.04L9.927 2.028q-.042.172-.04.343a1.8 1.8 0 0 0 .062.46z" />
                                    </svg></i>
                            <?php endif; ?>
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
                                    <input type="hidden" name="delete_id" value="<?php echo $memo['id'] ?>">
                                    <input type="submit" value="削除">
                                </form>
                            </div>
                            <!-- //固定ボタン -->
                            <div class="hold_area">
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="hold_id" value="<?php echo $memo['id'] ?>">
                                    <input type="submit" name="hold_submit" value="固定">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
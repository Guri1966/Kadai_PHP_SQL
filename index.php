<?php

include './dbConnection.php';

include './hold.php';
include './insert.php';
include './delete.php';
include './update.php';
include './select.php';

?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メモ帳</title>
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
                        <?php if ($memo['invalid'] == 1): ?>
                            <p style="color: red;">📌</p>
                        <?php endif; ?>
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
                                    <input type="hidden" name="delete_id" value="<?php echo $memo['id'] ?>">
                                    <input type="submit" value="削除">
                                </form>
                            </div>
                            <div class="hold_area">
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="hold_id" value="<?php echo $memo['id'] ?>">
                                    <input type="submit" name="hold_submit"
                                        value="<?php echo ($memo['invalid'] == 1) ? '解除' : '固定'; ?>">
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